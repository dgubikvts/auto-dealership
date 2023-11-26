<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandStoreRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function create(BrandStoreRequest $request)
    {
        Brand::create($request->validated());
        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        $brand = $request->get('brand');
        $brand->delete();
        return response()->json(['success' => true]);
    }
}
