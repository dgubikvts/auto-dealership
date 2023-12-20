<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Enum\WheelsEnum;
use App\Services\FilterVehicle\Filters\AbstractTypes\AbstractEnumFilter;

class WheelFilter extends AbstractEnumFilter
{
    protected string $type = 'wheels';

    protected string $enum = WheelsEnum::class;

    protected string $field = 'wheels';
}
