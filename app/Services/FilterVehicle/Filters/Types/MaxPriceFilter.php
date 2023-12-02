<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\MaxFilter;

class MaxPriceFilter extends MaxFilter
{
    protected string $type = 'max-price';

    protected string $field = 'price';
}
