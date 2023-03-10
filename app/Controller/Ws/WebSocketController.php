<?php

declare(strict_types=1);


namespace App\Controller\Ws;

use App\Container\Log;
use App\Enum\Ws\WsTraits;
use App\Services\Customer\WsUserService;
use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\WebSocketServer\Constant\Opcode;
use Swoole\Http\Request;
use Swoole\Server;
use Swoole\Websocket\Frame;
use Swoole\WebSocket\Server as WebSocketServer;
use Hyperf\WebSocketServer\Context;

class WebSocketController implements OnMessageInterface, OnOpenInterface, OnCloseInterface
{
    use WsTraits;

    #[Inject]
    protected WsUserService $userService;

    public function onMessage($server,$frame): void
    {
        switch ($frame->opcode) {
            case Opcode::PING:
                $server->push($frame->fd, $this->getPingMessage(),Opcode::PONG);
                return;
            default:

        }
        $server->push($frame->fd,json_encode($frame->data,JSON_UNESCAPED_UNICODE));
    }

    public function onClose($server, int $fd, int $reactorId): void
    {
        $this->userService->delUser( $fd);
    }

    public function onOpen($server,  $request): void
    {

         var_dump($request->getData());
         $this->userService->setUser($server->fd,[
             'user_token' => $request->get('user_token'),
             'user_name' => '小美_'.$server->fd
         ]);
        $server->push($request->fd, $this->getOpenMessage());
    }
}