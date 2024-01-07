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
        if(!isset($request->id)) return \response()->json(['errors' => ['id' => 'Brand id is required!']], 422);

        $brand = Brand::find($request->id);
        if(!$brand){
            return \response()->json(['errors' => ['id' => 'Brand with id ' . $request->id . ' does not exist!']], 422);
        }

        $request->attributes->add(['brand' => $brand]);

        return $next($request);
    }
}
