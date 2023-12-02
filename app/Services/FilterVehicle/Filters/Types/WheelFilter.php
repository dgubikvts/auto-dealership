<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Enum\WheelsEnum;
use App\Services\FilterVehicle\Filters\AbstractTypes\EnumFilter;

class WheelFilter extends EnumFilter
{
    protected string $type = 'wheels';

    protected string $enum = WheelsEnum::class;

    protected string $field = 'wheels';
}
