<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\AbstractMinFilter;

class MinYearFilter extends AbstractMinFilter
{
    protected string $type = 'min-year';

    protected string $field = 'year';
}
