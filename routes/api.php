<?php

use App\Http\Controllers\Api\CommodityApiController;
use App\Http\Controllers\Api\SchoolApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('commodities', CommodityApiController::class);
    Route::apiResource('schools', SchoolApiController::class);
// });
