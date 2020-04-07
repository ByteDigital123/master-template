<?php

namespace App\Repositories\AdminUser;


use Illuminate\Support\ServiceProvider;


class AdminUserServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\AdminUser\AdminUserInterface', 'App\Repositories\AdminUser\EloquentAdminUserRepository');
    }
}