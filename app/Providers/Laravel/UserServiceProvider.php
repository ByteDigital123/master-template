<?php

namespace App\Providers\Laravel;

use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make('App\Repositories\User\UserInterface'));
        });
    }
}
