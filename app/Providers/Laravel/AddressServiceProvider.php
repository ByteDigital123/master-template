<?php

namespace App\Providers\Laravel;

use App\Services\AddressService;
use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
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
        $this->app->bind(AddressService::class, function ($app) {
            return new AddressService($app->make('App\Repositories\Address\AddressInterface'));
        });
    }
}
