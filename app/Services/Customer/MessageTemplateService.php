<?php

declare(strict_types=1);


namespace App\Services\Customer;

use App\Enum\Ws\WsMessageCodeEnum;

class MessageTemplateService
{
    // "avatar": "https://cdn.learnku.com//uploads/communities/Y7fElYYwCFjTTXCdwPNW.png!/both/44x44",
    //    "fid": 1,
    //    "message": "你好，请问你家产品怎么卖买",
    //    "data":{},
    //    "message_type": 1,
    //    "me": false,
    //    "name": "我",
    //    "created_at": "2023-01-11 20:59:44"
    public const MessageTemplate = [
        [
            'avatar' => 'https://cdn.learnku.com/uploads/avatars/32593_1652273246.jpeg!/both/200x200',
            'fid'=>0,
            'message' => '您好 请问有什么可以帮到您!',
            'data' =>  [],
            'code' => WsMessageCodeEnum::TEXT_MESSAGE,
            'me'=>false,
            'name'=>'小程序客服',
            'created_at' => '',
            'is_client'=>false
        ],
        [
            'avatar' => 'https://cdn.learnku.com/uploads/avatars/32593_1652273246.jpeg!/both/200x200',
            'fid'=>0,
            'message' => '🥰🥰🥰',
            'data' =>  [],
            'code' => WsMessageCodeEnum::TEXT_MESSAGE,
            'me'=>false,
            'name'=>'小程序客服',
            'created_at' => '',
            'is_client'=>false
        ]
    ];
    public function getTemplate($key) :string
    {
        $messages = self::MessageTemplate;
        $messages[$key]['created_at'] = date('Y-m-d H:i:s');
        return json_encode($messages[$key],JSON_UNESCAPED_UNICODE);
    }

    public function getFdTemplate(int $fid,int $sessionId) :string
    {
        return json_encode([
            'code' => WsMessageCodeEnum::FD_MESSAGE,
            'fid' => $fid,
            'session_id' => $sessionId
        ],JSON_UNESCAPED_UNICODE);
    }

}