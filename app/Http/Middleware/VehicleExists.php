<?php

namespace App\Http\Middleware;

use App\Models\Vehicle;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!isset($request->id)) return \response()->json(['errors' => ['id' => 'Vehicle id is required!']], 422);

        $vehicle = Vehicle::find($request->id);
        if(!$vehicle){
            return \response()->json(['errors' => ['id' => 'Vehicle with id ' . $request->id . ' does not exist!']], 422);
        }

        $request->attributes->add(['vehicle' => $vehicle]);

        return $next($request);
    }
}
