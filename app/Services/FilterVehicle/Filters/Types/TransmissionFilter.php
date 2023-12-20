<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Enum\TransmissionEnum;
use App\Services\FilterVehicle\Filters\AbstractTypes\AbstractEnumFilter;

class TransmissionFilter extends AbstractEnumFilter
{
    protected string $type = 'transmission';

    protected string $enum = TransmissionEnum::class;

    protected string $field = 'transmission';
}
