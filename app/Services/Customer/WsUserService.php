<?php

declare(strict_types=1);


namespace App\Services\Customer;
use Hyperf\Cache\Annotation\Cacheable;
use Hyperf\Cache\Annotation\CacheEvict;

class WsUserService
{

    #[Cacheable(prefix: "ws:user", ttl: 7200*36, value: "_#{fid}")]
    public function setUser(int $fid, array $data =[])
    {
        return $data;
    }

    #[CacheEvict(prefix: "ws:user", value: "_#{fid}")]
    public function delUser(int $fid){
        return true;
    }
}