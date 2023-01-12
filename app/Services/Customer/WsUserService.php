<?php

declare(strict_types=1);


namespace App\Services\Customer;
use App\Container\Cache;
use App\Enum\Ws\WsCacheEnum;


class WsUserService
{
    public static function setUserCache(int $fd,string $cookie)
    {
        Cache::get()->set(WsCacheEnum::FD_FIX.$fd,$cookie,WsCacheEnum::FD_FIX_TIMEOUT);
        Cache::get()->set(WsCacheEnum::FD_FIX.$cookie,$fd,WsCacheEnum::FD_FIX_TIMEOUT);
    }

    public static function delUserCache(int $fd,string $cookie='')
    {
        Cache::get()->delete(WsCacheEnum::FD_FIX.$fd);
        if(!empty($cookie)) {
            Cache::get()->delete(WsCacheEnum::FD_FIX.$cookie);
        }
    }
}