<?php
declare(strict_types=1);
/**
 * Created By PhpStorm.
 * User : Latent
 * Date : 2023/1/15
 * Time : 09:58
 **/

namespace App\Model\Customer;

use Qbhy\HyperfAuth\AuthAbility;
use Qbhy\HyperfAuth\Authenticatable;

class CustomerUser extends CustomerBaseModel implements Authenticatable
{
    use AuthAbility;

    protected array $guarded =[];
}
