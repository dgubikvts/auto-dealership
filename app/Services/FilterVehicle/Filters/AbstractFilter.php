<?php

namespace App\Services\FilterVehicle\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{
    protected string $type;

    protected string $field;

    public function maybeApplyFilter(Builder &$data, array $params): void
    {
        if(isset($params[$this->type]))
            $this->apply($data, $params[$this->type]);
    }

    public abstract function apply(Builder &$data, mixed $value): void;
}
