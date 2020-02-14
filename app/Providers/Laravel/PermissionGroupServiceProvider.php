<?php

namespace App\Providers\Laravel;

use App\Services\PermissionGroupService;
use Illuminate\Support\ServiceProvider;

class PermissionGroupServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PermissionGroupService::class, function ($app) {
            return new PermissionGroupService($app->make('App\Repositories\PermissionGroup\PermissionGroupInterface'));
        });
    }
}
