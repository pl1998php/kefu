<?php

declare(strict_types=1);


namespace App\Enum\Ws;

enum WsMessageCodeEnum
{
    /** @var int 文本消息 */
    public const  TEXT_MESSAGE   = 1;

    /** @var int 文件消息 */
    public const  FILE_MESSAGE   = 2;

    /** @var int 图片消息 */
    public const  IMG_MESSAGE    = 3;

    /** @var int 语音消息 */

    public const  VOICE_MESSAGE  = 4;

    /** @var int 富文本消息 */
    public const  RICH_TEXT_MESSAGE  = 5;

    /** @var int 捂手 */
    public const  FD_MESSAGE  = 6;

    /** @var int 心跳 */
    public const  PING_MESSAGE  = 6;

    /** @var int 会话关闭 */
    public const  DOWN_MESSAGE  = 7;

    /** @var int 会话权限异常 */
    public const   AUTHORITY_ERROR  = 8;

    /** @var int 会话列表 */
    public const   SESSION_LIST  = 9;

    /** @var int 消息解析异常 */
    public const   MESSAGE_ERROR  = 10;
}