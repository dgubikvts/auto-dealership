<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\FilterVehicleController;
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

Route::middleware('auth.basic.once')->group(function() {
    Route::controller(BrandController::class)->group(function(){
        Route::prefix('brand')->group(function() {
            Route::post('/create', 'create');
            Route::middleware('brand.exists')->group(function() {
                Route::post('/delete', 'delete');
            });
        });
    });

    Route::controller(VehicleController::class)->group(function(){
        Route::prefix('vehicle')->group(function() {
            Route::post('/create', 'create');
            Route::middleware('vehicle.exists')->group(function() {
                Route::post('/update', 'update');
                Route::post('/delete', 'delete');
            });
        });
    });

    Route::controller(FilterVehicleController::class)->group(function(){
        Route::get('/vehicles', 'index');
    });
});
