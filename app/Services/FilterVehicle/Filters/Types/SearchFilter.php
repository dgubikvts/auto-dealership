<?php

namespace App\Services\FilterVehicle\Filters\Types;

use App\Services\FilterVehicle\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Collection;

class SearchFilter extends AbstractFilter
{
    protected string $type = 'search';

    protected string $field = 'model';

    public function apply(Collection &$data, mixed $value): void
    {
        $data = $data->filter(fn($item) => stristr($item->{$this->field}, $value));
    }
}
