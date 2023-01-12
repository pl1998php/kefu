<?php

declare(strict_types=1);

namespace App\Model\Customer;

use App\Enum\DatabaseEnum;
use App\Model\Model;

class CustomerBaseModel extends Model
{
    protected ?string $connection = DatabaseEnum::CUSTOMER_CONNECTION;
    public array $guarded = [];
}
