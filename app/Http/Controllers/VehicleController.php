<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function create(VehicleStoreRequest $request)
    {
        Vehicle::create($request->validated());
        return response()->json(['success' => true]);
    }

    public function update(VehicleStoreRequest $request)
    {
        $validated = $request->validated();
        $vehicle = $request->get('vehicle');
        $vehicle->update($validated);
        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        $brand = $request->get('vehicle');
        $brand->delete();
        return response()->json(['success' => true]);
    }
}
