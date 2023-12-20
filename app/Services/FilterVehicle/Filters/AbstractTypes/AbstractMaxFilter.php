<?php

namespace App\Services\FilterVehicle\Filters\AbstractTypes;

use App\Services\FilterVehicle\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractMaxFilter extends AbstractFilter
{
    public function apply(Builder &$data, mixed $value): void
    {
        $data = $data->where($this->field, '<=', $value);
    }
}
