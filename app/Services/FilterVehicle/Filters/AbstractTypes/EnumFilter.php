<?php

namespace App\Services\FilterVehicle\Filters\AbstractTypes;

use App\Services\EnumHelper\EnumHelper;
use App\Services\FilterVehicle\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Collection;

abstract class EnumFilter extends AbstractFilter
{
    protected string $enum;

    public function apply(Collection &$data, mixed $value): void
    {
        $data = $data->where($this->field, EnumHelper::getCaseByValue($this->enum, $value));
    }
}
