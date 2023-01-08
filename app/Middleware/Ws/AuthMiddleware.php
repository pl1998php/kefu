<?php

declare(strict_types=1);

namespace App\Middleware\Ws;

use App\Container\Log;
use App\Enum\HttpCodeEnum;
use App\Model\Shop\Apps;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{


    public function __construct(protected ContainerInterface $container)
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $params = $request->getQueryParams();
        Log::get()->info('ws',$params);

        if(Apps::check($params['app_id'] ?? '',$params['app_key'] ?? '')) {
            throw new \HttpException('没权限',HttpCodeEnum::UNAUTHORIZED);
        }
        if(!isset($params['user_token'])) {
            throw new \HttpException('用户凭证不存在',HttpCodeEnum::UNAUTHORIZED);
        }
        Log::get()->info('ws',$request->getServerParams());
        return $handler->handle($request);
    }
}
