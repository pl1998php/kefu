<?php

declare(strict_types=1);


namespace App\Exception\Handler;


use App\Enum\HttpCodeEnum;
use App\Trains\ResponseHandler;
use  Hyperf\HttpServer\Exception\Handler\HttpExceptionHandler as ParentHttpExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use function PHPUnit\Framework\matches;

class HttpExceptionHandler extends ParentHttpExceptionHandler
{
    use ResponseHandler;

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->logger->debug($this->formatter->format($throwable));

        $this->stopPropagation();
        $message = match($throwable->getCode()){
            HttpCodeEnum::NOT_FOUND => '路由不存在',
            HttpCodeEnum::METHOD_NOT_ALLOWED => '请求方法不允许',
            default => $throwable->getMessage()
        };
        return $response->withStatus($throwable->getStatusCode())
            ->withBody($this->getSwooleStream($throwable->getCode(),$message));
    }
}