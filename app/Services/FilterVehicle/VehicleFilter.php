<?php

namespace App\Services\FilterVehicle;

use App\Models\Vehicle;
use App\Services\FilterVehicle\Filters\FilterFactory;
use Illuminate\Database\Eloquent\Builder;

class VehicleFilter
{
    private int $per_page = 12;

    private Builder $vehicles;

    private array $params;

    public function __construct()
    {
        $this->vehicles = Vehicle::query();

        $this->params = request()->all();
    }

    public function apply(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        foreach(FilterFactory::getAll() as $filter) {
            $filter->maybeApplyFilter($this->vehicles, $this->params);
        }

        return $this->vehicles->paginate($this->per_page);
    }
}
