<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\AbstractMinFilter;

class MinMileageFilter extends AbstractMinFilter
{
    protected string $type = 'min-mileage';

    protected string $field = 'mileage';
}
