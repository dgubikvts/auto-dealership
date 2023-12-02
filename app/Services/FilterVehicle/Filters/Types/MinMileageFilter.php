<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\MinFilter;

class MinMileageFilter extends MinFilter
{
    protected string $type = 'min-mileage';

    protected string $field = 'mileage';
}
