<?php

namespace App\Providers\Laravel;

use App\Services\ModelHasPermissionService;
use Illuminate\Support\ServiceProvider;

class ModelHasPermissionServiceProvider extends ServiceProvider
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
        $this->app->bind(ModelHasPermissionService::class, function ($app) {
            return new ModelHasPermissionService($app->make('App\Repositories\ModelHasPermission\ModelHasPermissionInterface'));
        });
    }
}
