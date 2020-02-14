<?php

namespace App\Providers\Laravel;

use App\Services\ModelHasRoleService;
use Illuminate\Support\ServiceProvider;

class ModelHasRoleServiceProvider extends ServiceProvider
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
        $this->app->bind(ModelHasRoleService::class, function ($app) {
            return new ModelHasRoleService($app->make('App\Repositories\ModelHasRole\ModelHasRoleInterface'));
        });
    }
}
