<?php

namespace App\Repositories\Provider;


use Illuminate\Support\ServiceProvider;


class ProviderServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\Provider\ProviderInterface', 'App\Repositories\Provider\EloquentProviderRepository');
    }
}