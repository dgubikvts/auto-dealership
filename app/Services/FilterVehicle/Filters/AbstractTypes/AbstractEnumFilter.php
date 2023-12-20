<?php

namespace App\Services\FilterVehicle\Filters\AbstractTypes;

use App\Services\EnumHelper\EnumHelper;
use App\Services\FilterVehicle\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractEnumFilter extends AbstractFilter
{
    protected string $enum;

    public function apply(Builder &$data, mixed $value): void
    {
        $data = $data->where($this->field, EnumHelper::getCaseByValue($this->enum, $value));
    }
}
