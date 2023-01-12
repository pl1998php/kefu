<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Services\Common;

use App\Model\Shop\Users;
use Hyperf\Di\Annotation\Inject;
use Qbhy\HyperfAuth\AuthManager;

trait AuthTrains
{
    #[Inject]
    protected AuthManager $auth;

    /**
     * 组装返回用户信息.
     * @param Users $users
     */
    protected function getData(object $users): array
    {
        return [
            'token'       => $this->auth->guard($this->guard)->login($users),
            'user_id'     => $users->user_id,
            'avatar'      => $users->avatar,
            'nick_name'   => $users->nick_name,
            'name'        => $users->name,
            'phone'       => $users->phone,
            'wx_open_id'  => $users->wx_open_id,
            'wx_union_id' => $users->wx_union_id,
            'ttl'         => config('auth.guards.'.$this->guard.'.ttl')
        ];
    }

    /**
     * 组装返回用户信息.
     * @param Users $users
     */
    protected function getAdminData(object $users): array
    {
        return [
            'token'       => $this->auth->guard($this->guard)->login($users),
            'app_id'      => $users->app_id,
            'avatar'      => $users->avatar,
            'name'        => $users->name,
            'six'         => $users->six,
            'email'       => $users->email,
            'created_at'  => $users->created_at,
            'ttl'         => config('auth.guards.'.$this->guard.'.ttl')
        ];
    }
}
