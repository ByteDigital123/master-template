<?php

namespace App\Providers\Laravel;

use App\Services\TransactionStatusService;
use Illuminate\Support\ServiceProvider;

class TransactionStatusServiceProvider extends ServiceProvider
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
        $this->app->bind(TransactionStatusService::class, function ($app) {
            return new TransactionStatusService($app->make('App\Repositories\TransactionStatus\TransactionStatusInterface'));
        });
    }
}
