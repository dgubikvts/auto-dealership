<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractTypes\AbstractMaxFilter;

class MaxPriceFilter extends AbstractMaxFilter
{
    protected string $type = 'max-price';

    protected string $field = 'price';
}
