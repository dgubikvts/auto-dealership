<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\MinFilter;

class MinPriceFilter extends MinFilter
{
    protected string $type = 'min-price';

    protected string $field = 'price';
}
