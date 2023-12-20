<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class SearchFilter extends AbstractFilter
{
    protected string $type = 'search';

    protected string $field = 'model';

    public function apply(Builder &$data, mixed $value): void
    {
        $data = $data->where($this->field, 'LIKE', $value);
    }
}
