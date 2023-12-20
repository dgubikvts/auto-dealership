<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\AbstractMinFilter;

class MinPriceFilter extends AbstractMinFilter
{
    protected string $type = 'min-price';

    protected string $field = 'price';
}
