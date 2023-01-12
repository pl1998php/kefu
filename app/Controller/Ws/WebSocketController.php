<?php

declare(strict_types=1);


namespace App\Controller\Ws;

use App\Container\Cache;
use App\Container\Log;
use App\Enum\Ws\WsCacheEnum;
use App\Enum\Ws\WsMessageCodeEnum;
use App\Enum\Ws\WsTraits;
use App\Model\Customer\CustomerSession;
use App\Model\Customer\CustomerSessionMessage;
use App\Services\Customer\MessageTemplateService;
use App\Services\Customer\WsUserService;
use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\WebSocketServer\Constant\Opcode;



class WebSocketController implements OnMessageInterface, OnOpenInterface, OnCloseInterface
{
    use WsTraits;



    public function onMessage($server,$frame): void
    {
        switch ($frame->opcode) {
            case Opcode::PING:
                $server->push($frame->fd, $this->getPingMessage(),Opcode::PONG);
                return;
            default:
                    try {
                        $message = json_decode($frame->data,true);
                        CustomerSessionMessage::create([
                            'session_id' => $message['session_id'] ?? 0,
                            'message' => $frame->data,
                            'status' => CustomerSessionMessage::STATUS_NOT,
                            'customer_id' => 1
                        ]);
                        $server->push($frame->fd,$frame->data);
                    }catch (\Throwable $exception) {
                        $server->push($frame->fd,json_encode([
                            'code'=> WsMessageCodeEnum::MESSAGE_ERROR,
                            'message' => '消息解析异常'
                        ]));
                    }
        }

    }

    public function onClose($server, int $fd, int $reactorId): void
    {
       WsUserService::delUserCache($fd);
    }

    public function onOpen($server,  $request): void
    {
        // 判断会话是否存在 创建会话
       if(!isset($request->get['cookie'])) {
           $server->push($request->fd,json_encode([
               'code' => WsMessageCodeEnum::AUTHORITY_ERROR,
               'message' => '用户cookie不存在'
           ],JSON_UNESCAPED_UNICODE));
           $server->close();
       }
       // 设置缓存
        WsUserService::setUserCache($request->fd,$request->get['cookie']);

       $session =  CustomerSession::where('cookie',$request->get['cookie'])->first();
       if($session) {
           if($session->status === CustomerSession::SESSION_STATUS_DOWN) {
               $server->push($request->fd,json_encode([
                   'code' => WsMessageCodeEnum::DOWN_MESSAGE,
                   'message' => '会话已结束'
               ],JSON_UNESCAPED_UNICODE));
               WsUserService::delUserCache($request->fd,$request->get['cookie']);
               $server->close();
               return;
           }
           $messageTemplateService = new MessageTemplateService();
           $server->push($request->fd,$messageTemplateService->getFdTemplate($request->fd,$session->id));

          $list =  CustomerSessionMessage::where('session_id',$session->id)->get()->map(function ($value){
              $value->message= json_decode($value->message,true);
              return $value;
          });
           $server->push($request->fd,json_encode([
               'code' => WsMessageCodeEnum::SESSION_LIST,
               'data' => $list->toArray()
           ],JSON_UNESCAPED_UNICODE));

       } else{
          // 创建会话 分配人员
          $session =  CustomerSession::create([
               'status' => CustomerSession::SESSION_STATUS_JIN_XIN,
               'cookie' => $request->get['cookie'],
               'ip' =>$request->server['remote_addr'],
               'to_id' => 1
           ]);

           $messageTemplateService = new MessageTemplateService();
           $server->push($request->fd,$messageTemplateService->getFdTemplate($request->fd,$session->id));

           $server->push($request->fd, $this->getPingMessage(),Opcode::PONG);
           $server->push($request->fd, $messageTemplateService->getTemplate(0));
           $server->push($request->fd, $messageTemplateService->getTemplate(1));
       }


    }
}
