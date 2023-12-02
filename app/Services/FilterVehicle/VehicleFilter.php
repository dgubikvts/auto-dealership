<?php

namespace App\Services\FilterVehicle;

use App\Models\Vehicle;
use App\Services\FilterVehicle\Filters\FilterFactory;
use Illuminate\Database\Eloquent\Collection;

class VehicleFilter
{
    private int $per_page = 12;

    private int $page;

    private Collection $vehicles;

    private array $params;

    public function __construct()
    {
        $this->vehicles = Vehicle::all();

        $this->params = request()->all();

        $this->page = $this->params['page'] ?? 1;
    }

    public function apply(): array
    {
        foreach(FilterFactory::getAll() as $filter) {
            $filter->maybeApplyFilter($this->vehicles, $this->params);
        }
        $pages = ceil($this->vehicles->count() / $this->per_page);
        $offset = ($this->page - 1) * $this->per_page;

        return [
            $this->vehicles->slice($offset, $this->per_page),
            $pages
        ];
    }
}
