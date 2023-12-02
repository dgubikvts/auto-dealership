<?php

namespace App\Services\FilterVehicle\Filters;

use App\Services\FilterVehicle\Filters\Types\BrandFilter;
use App\Services\FilterVehicle\Filters\Types\FuelFilter;
use App\Services\FilterVehicle\Filters\Types\MaxMileageFilter;
use App\Services\FilterVehicle\Filters\Types\MaxPriceFilter;
use App\Services\FilterVehicle\Filters\Types\MaxYearFilter;
use App\Services\FilterVehicle\Filters\Types\MinMileageFilter;
use App\Services\FilterVehicle\Filters\Types\MinPriceFilter;
use App\Services\FilterVehicle\Filters\Types\MinYearFilter;
use App\Services\FilterVehicle\Filters\Types\SearchFilter;
use App\Services\FilterVehicle\Filters\Types\TransmissionFilter;
use App\Services\FilterVehicle\Filters\Types\VehicleTypeFilter;
use App\Services\FilterVehicle\Filters\Types\WheelFilter;

class FilterFactory
{
    public static function getAll(): array
    {
        return [
            new WheelFilter(),
            new TransmissionFilter(),
            new FuelFilter(),
            new VehicleTypeFilter(),
            new MinPriceFilter(),
            new MaxPriceFilter(),
            new MinMileageFilter(),
            new MaxMileageFilter(),
            new MinYearFilter(),
            new MaxYearFilter(),
            new SearchFilter(),
            new BrandFilter(),
        ];
    }
}
