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

use App\Enum\UserEnum;
use App\Model\Customer\CustomerUser;
use App\Model\Shop\Users;

class AuthService
{
    use AuthTrains;

    /** @var string */
    public $guard = UserEnum::API_JWT;


    /**
     * 设置守卫
     * @param string $guard
     * @return $this
     */
    public function setGuard(string $guard):AuthService
    {
        $this->guard = $guard;
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function login(array $params): array|\Exception
    {
        $users = Users::where('phone', $params['phone'])->first();
        if (! $users) {
            throw new \Exception('用户不存在');
        }
        if (! password_verify($params['password'], $users->password)) {
            throw new \Exception('密码错误');
        }
        return $this->getData($users);
    }


    /**
     * @throws \Exception
     */
    public function adminLogin(array $params): array|\Exception
    {
        $users = CustomerUser::where('email', $params['email'])->first();
        if (! $users) {
            throw new \Exception('用户不存在');
        }
        if (! password_verify(getPassword($params['password']), $users->password)) {
            throw new \Exception('密码错误');
        }
        return $this->getAdminData($users);
    }
    /**
     * @return array
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/8   11:07
     */
    public function getUser()
    {
        $user = $this->auth->guard($this->guard)->user();
       return match ($this->guard){
            UserEnum::API_JWT  => $this->getData($user),
            UserEnum::ADMIN_JWT=> $this->getAdminData($user),
        };
    }
}
