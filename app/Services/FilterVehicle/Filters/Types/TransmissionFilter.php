<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Enum\TransmissionEnum;
use App\Services\FilterVehicle\Filters\AbstractTypes\EnumFilter;

class TransmissionFilter extends EnumFilter
{
    protected string $type = 'transmission';

    protected string $enum = TransmissionEnum::class;

    protected string $field = 'transmission';
}
