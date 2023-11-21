<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;

class VehicleController extends Controller
{
    public function create(VehicleStoreRequest $request)
    {
        $validated = $request->validated();

    }
}
