<?php

namespace App\Providers\Laravel;

use App\Services\CountryService;
use Illuminate\Support\ServiceProvider;

class CountryServiceProvider extends ServiceProvider
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
        $this->app->bind(CountryService::class, function ($app) {
            return new CountryService($app->make('App\Repositories\Country\CountryInterface'));
        });
    }
}
