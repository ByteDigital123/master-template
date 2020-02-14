<?php

namespace App\Repositories\ModelHasPermission;


use Illuminate\Support\ServiceProvider;


class ModelHasPermissionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\ModelHasPermission\ModelHasPermissionInterface', 'App\Repositories\ModelHasPermission\EloquentModelHasPermissionRepository');
    }
}