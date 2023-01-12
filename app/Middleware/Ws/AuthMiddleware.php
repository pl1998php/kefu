<?php

declare(strict_types=1);

namespace App\Middleware\Ws;

use _PHPStan_d279f388f\Nette\Neon\Exception;
use App\Container\Log;
use App\Enum\HttpCodeEnum;
use App\Exception\Handler\HttpExceptionHandler;
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

        if(!Apps::check($params['app_key'] ?? '')) {
            throw new Exception('没权限',HttpCodeEnum::UNAUTHORIZED);
        }
        if(!isset($params['user_token'])) {
            throw new Exception('用户凭证不存在',HttpCodeEnum::UNAUTHORIZED);
        }
        Log::get()->info('ws',$request->getServerParams());
        return $handler->handle($request);
    }
}
