<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\PermissionRegistrar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // API
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        // Permission
        // app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
