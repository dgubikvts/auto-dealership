<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\AbstractMaxFilter;

class MaxYearFilter extends AbstractMaxFilter
{
    protected string $type = 'max-year';

    protected string $field = 'year';
}
