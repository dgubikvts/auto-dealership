<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Collection;

class BrandFilter extends AbstractFilter
{
    protected string $type = 'brand';

    protected string $field = 'brand_id';

    public function apply(Collection &$data, mixed $value): void
    {
        $data = $data->where($this->field, $value);
    }
}
