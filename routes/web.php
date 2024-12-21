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
})->middleware('guest');

Route::prefix('commodities/export')->group(function () {
    Route::get('/xlsx', [CommodityController::class, 'exportXlsx'])->name('commodities.export.xlsx');
    Route::get('/pdf', [CommodityController::class, 'exportPdf'])->name('commodities.export.pdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('can:view school')->group(function () {
        Route::resource('schools', SchoolController::class);
    });

    Route::middleware('can:view commodity')->group(function () {
        Route::resource('commodities', CommodityController::class);
    });

    Route::middleware('can:view user')->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::middleware('can:view seed')->group(function () {
        Route::resource('seed-distributions', SeedDistributionController::class);
    });

    Route::middleware('can:view fertilizer')->group(function () {
        Route::resource('fertilizer-distributions', FertilizerDistributionController::class);
    });

    Route::middleware('can:view leveling')->group(function () {
        Route::resource('levelings', LevelingController::class);
    });
});

require __DIR__ . '/auth.php';
