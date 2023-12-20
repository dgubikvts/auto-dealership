<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Enum\VehicleTypeEnum;
use App\Services\FilterVehicle\Filters\AbstractTypes\AbstractEnumFilter;

class VehicleTypeFilter extends AbstractEnumFilter
{
    protected string $type = 'vehicle_type';

    protected string $enum = VehicleTypeEnum::class;

    protected string $field = 'vehicle_type';
}
