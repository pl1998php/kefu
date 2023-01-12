<?php

declare(strict_types=1);


namespace App\Container;

use Hyperf\Utils\ApplicationContext;
use Psr\SimpleCache\CacheInterface;

class Cache
{

    /**
     * @return mixed|CacheInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/2/1   22:16
     */
    public static function get()
    {
        return ApplicationContext::getContainer()->get(CacheInterface::class);
    }
}