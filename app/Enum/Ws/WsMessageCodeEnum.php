<?php

declare(strict_types=1);


namespace App\Enum\Ws;

enum WsMessageCodeEnum
{
    /** @var int 成功状态码 */
    public const  SUCCESS= 0;

    /** @var int 没权限-应用id不存在 */
    public const  UNAUTHORIZED = 401;

    /** @var int 没权限-应用key已经过期了 */
    public const  FORBIDDEN= 403;

    /** @var int 没权限-服务异常 */
    public const  SERVE_ERROR = 500;

    /** @var int 心跳 */
    public const  PING = 100;
}