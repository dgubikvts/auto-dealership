<?php

namespace App\Services\FilterVehicle\Filters\AbstractTypes;

use App\Services\FilterVehicle\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Collection;

abstract class MaxFilter extends AbstractFilter
{
    public function apply(Collection &$data, mixed $value): void
    {
        $data = $data->where($this->field, '<=', $value);
    }
}
