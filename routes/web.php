<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FertilizerDistributionController;
use App\Http\Controllers\LevelingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SeedDistributionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('schools', SchoolController::class);
    Route::resource('commodities', CommodityController::class);
    Route::resource('users', UserController::class);
    Route::resource('seed-distributions', SeedDistributionController::class);
    Route::resource('fertilizer-distributions', FertilizerDistributionController::class);
    Route::resource('levelings', LevelingController::class);
});

require __DIR__.'/auth.php';
