<?php

declare(strict_types=1);


namespace App\Controller\Api\V1;

use App\Controller\ApiController;
use App\Request\Api\FileRequest;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\Middleware;
use App\Middleware\Ws\AuthMiddleware;
use App\Middleware\CorsMiddleware;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Filesystem\FilesystemFactory;
use Hyperf\Utils\Str;

#[Controller]
#[Middleware(CorsMiddleware::class)]
#[Middleware(AuthMiddleware::class)]
class FileController extends ApiController
{
    /**
     * @param FilesystemFactory $factory
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/30   22:20
     */
    #[RequestMapping(path: 'upload', methods: 'post')]
    public function upload(FilesystemFactory $factory)
    {
        $request = $this->container->get(FileRequest::class);
        $request->validateResolved();

        $qiniu = $factory->get('qiniu');

        $file = $this->request->file('file');

        $extension = strtolower($file->getExtension()) ?: 'png';

        $filename = time() . '_' . Str::random(10) . '.' . $extension;

        $result = $qiniu->put($filename,file_get_contents($file->getRealPath()));

        if($result) {
            return $this->success([
                'url' => env('QINIU_DOMAIN').'/'.$filename,
                'name' => $filename
            ]);
        }

        return $this->fail('文件上传失败');

    }
}