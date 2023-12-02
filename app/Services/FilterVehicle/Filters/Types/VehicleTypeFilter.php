<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Enum\VehicleTypeEnum;
use App\Services\FilterVehicle\Filters\AbstractTypes\EnumFilter;

class VehicleTypeFilter extends EnumFilter
{
    protected string $type = 'vehicle_type';

    protected string $enum = VehicleTypeEnum::class;

    protected string $field = 'vehicle_type';
}
