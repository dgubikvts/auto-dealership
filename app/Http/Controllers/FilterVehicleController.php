<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Services\FilterVehicle\VehicleFilter;
use Illuminate\Http\JsonResponse;

class FilterVehicleController extends Controller
{
    public function index(VehicleFilter $vehicleFilter): JsonResponse
    {
        $vehicles = $vehicleFilter->apply();
        return response()->json(['data' => VehicleResource::collection($vehicles->items()), 'pages' => $vehicles->lastPage()]);
    }
}
