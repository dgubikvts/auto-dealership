<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\AbstractMaxFilter;

class MaxMileageFilter extends AbstractMaxFilter
{
    protected string $type = 'max-mileage';

    protected string $field = 'mileage';
}
