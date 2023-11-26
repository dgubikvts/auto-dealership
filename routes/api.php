<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/brand/create', [BrandController::class, 'create'])->middleware('auth.basic.once');

Route::post('/brand/delete', [BrandController::class, 'delete'])->middleware('auth.basic.once', 'brand.exists');

Route::post('/vehicle/create', [VehicleController::class, 'create'])->middleware('auth.basic.once');

Route::post('/vehicle/update', [VehicleController::class, 'update'])->middleware('auth.basic.once', 'vehicle.exists');

Route::post('/vehicle/delete', [VehicleController::class, 'delete'])->middleware('auth.basic.once', 'vehicle.exists');
