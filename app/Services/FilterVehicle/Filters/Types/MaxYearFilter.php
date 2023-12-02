<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\MaxFilter;

class MaxYearFilter extends MaxFilter
{
    protected string $type = 'max-year';

    protected string $field = 'year';
}
