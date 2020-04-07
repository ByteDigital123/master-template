<?php

namespace App\Providers\Laravel;

use App\Services\AdminUserService;
use Illuminate\Support\ServiceProvider;

class AdminUserServiceProvider extends ServiceProvider
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
        $this->app->bind(AdminUserService::class, function ($app) {
            return new AdminUserService($app->make('App\Repositories\AdminUser\AdminUserInterface'));
        });
    }
}
