<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\MinFilter;

class MinYearFilter extends MinFilter
{
    protected string $type = 'min-year';

    protected string $field = 'year';
}
