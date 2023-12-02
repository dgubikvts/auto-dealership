<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\MaxFilter;

class MaxMileageFilter extends MaxFilter
{
    protected string $type = 'max-mileage';

    protected string $field = 'mileage';
}
