<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Enum\FuelEnum;
use App\Services\FilterVehicle\Filters\AbstractTypes\EnumFilter;

class FuelFilter extends EnumFilter
{
    protected string $type = 'fuel';

    protected string $enum = FuelEnum::class;

    protected string $field = 'fuel';
}
