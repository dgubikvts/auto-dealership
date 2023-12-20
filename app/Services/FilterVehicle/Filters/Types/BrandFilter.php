<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class BrandFilter extends AbstractFilter
{
    protected string $type = 'brand';

    protected string $field = 'id';

    public function apply(Builder &$data, mixed $value): void
    {
        $data = $data->whereHas('brand', fn($q) => $q->where($this->field, $value));
    }
}
