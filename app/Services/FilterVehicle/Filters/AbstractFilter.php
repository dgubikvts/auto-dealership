<?php

namespace App\Services\FilterVehicle\Filters;

use Illuminate\Database\Eloquent\Collection;

abstract class AbstractFilter
{
    protected string $type;

    protected string $field;

    public function maybeApplyFilter(Collection &$data, array $params): void
    {
        if(isset($params[$this->type]))
            $this->apply($data, $params[$this->type]);
    }

    public abstract function apply(Collection &$data, mixed $value): void;
}
