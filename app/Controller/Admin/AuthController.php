<?php
declare(strict_types=1);
/**
 * Created By PhpStorm.
 * User : Latent
 * Date : 2023/1/15
 * Time : 10:20
 **/

namespace App\Controller\Admin;

use App\Controller\ApiController;
use App\Enum\UserEnum;
use App\Middleware\Api\AuthMiddleware;
use App\Request\Admin\AuthRequest;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\RequestMapping;
use App\Services\Common\AuthService;
use Throwable;

#[Controller]
class AuthController extends ApiController
{
    /**
     * 登录.
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/8   11:05
     */
    #[RequestMapping(path: 'login', methods: 'post')]
    public function login(AuthService $authService)
    {
        $request = $this->container->get(AuthRequest::class);
        $request->scene('login')->validateResolved();

        $params = $request->post();

        try {
            $data = $authService->setGuard(UserEnum::ADMIN_JWT)->adminLogin($params);
            return $this->success($data);
        } catch (Throwable $throwable) {
            return $this->fail($throwable->getMessage(), 200);
        }
    }

    /**
     * 获取用户信息.
     * @return \Psr\Http\Message\ResponseInterface
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/8   11:10
     */
    #[RequestMapping(path: 'me', methods: 'get')]
    #[Middleware(AuthMiddleware::class)]
    public function me(AuthService $authService)
    {
        $data = $authService->setGuard(UserEnum::ADMIN_JWT)->getUser();
        return $this->success($data);
    }
}
