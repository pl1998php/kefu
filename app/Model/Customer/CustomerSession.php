<?php
declare(strict_types=1);
/**
 * Created By PhpStorm.
 * User : Latent
 * Date : 2023/1/15
 * Time : 09:57
 **/

namespace App\Model\Customer;

class CustomerSession extends CustomerBaseModel
{
    public const SESSION_STATUS_JIN_XIN = 0;
    public const SESSION_STATUS_DOWN = 1;

    public array $guarded = [];
}
