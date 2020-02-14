<?php

namespace App\Providers\Laravel;

use App\Services\ProviderService;
use Illuminate\Support\ServiceProvider;

class ProviderServiceProvider extends ServiceProvider
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
        $this->app->bind(ProviderService::class, function ($app) {
            return new ProviderService($app->make('App\Repositories\Provider\ProviderInterface'));
        });
    }
}
