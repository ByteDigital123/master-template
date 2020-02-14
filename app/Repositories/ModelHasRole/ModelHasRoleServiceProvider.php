<?php

namespace App\Repositories\ModelHasRole;


use Illuminate\Support\ServiceProvider;


class ModelHasRoleServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\ModelHasRole\ModelHasRoleInterface', 'App\Repositories\ModelHasRole\EloquentModelHasRoleRepository');
    }
}