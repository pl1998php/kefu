<?php

declare(strict_types=1);


namespace App\Enum\Ws;

enum WsCacheEnum
{
    const FD_FIX = 'ws:fd';
    const FD_FIX_TIMEOUT = 3600*24;
}
