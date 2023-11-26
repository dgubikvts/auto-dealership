<?php

namespace App\Http\Middleware;

use App\Models\Brand;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!isset($request->id)) return \response()->json(['error' => 'Brand id is required!']);

        $vehicle = Brand::find($request->id);
        if(!$vehicle){
            return \response()->json(['Brand with id ' . $request->id . ' does not exist!']);
        }

        $request->attributes->add(['brand' => $vehicle]);

        return $next($request);
    }
}
