<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CommodityApiController;
use App\Http\Controllers\Api\FertilizerDistributionApiController;
use App\Http\Controllers\Api\SchoolApiController;
use App\Http\Controllers\Api\SeedDistributionApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthApiController::class)->group(function () {
    Route::get('/login', 'login');
});

// Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('commodities', CommodityApiController::class);
    Route::apiResource('schools', SchoolApiController::class);
    Route::apiResource('seed-distributions', SeedDistributionApiController::class);
    Route::apiResource('fertilizer-distributions', FertilizerDistributionApiController::class);
// });
