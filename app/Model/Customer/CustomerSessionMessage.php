<?php
declare(strict_types=1);
/**
 * Created By PhpStorm.
 * User : Latent
 * Date : 2023/1/15
 * Time : 09:57
 **/

namespace App\Model\Customer;

use Hyperf\Utils\Str;

class CustomerSessionMessage extends CustomerBaseModel
{
//    /**
//     * Get the table associated with the model.
//     */
//    public function getTable(): string
//    {
//        return $this->table ?? Str::snake(Str::pluralStudly(class_basename($this))).'_'.date('Y_m');
//    }
    public const STATUS_NOT = 1;
}
