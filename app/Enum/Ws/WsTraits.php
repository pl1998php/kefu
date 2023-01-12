<?php

declare(strict_types=1);


namespace App\Enum\Ws;

trait WsTraits
{
    /**
     * @return false|string
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/8   20:55
     */
    public function getPingMessage()
    {
        return json_encode([
            'code' => WsMessageCodeEnum::PING_MESSAGE,
            'message' => 'ping'
        ],JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return false|string
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/8   20:55
     */
    public function getOpenMessage()
    {
        return json_encode([
            'code' => WsMessageCodeEnum::PING_MESSAGE,
            'message' => '用户上线了',
            'data' => [
                'avatar'=>''
            ],
        ],JSON_UNESCAPED_UNICODE);
    }
}