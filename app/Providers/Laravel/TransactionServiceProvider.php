<?php

namespace App\Providers\Laravel;

use App\Services\TransactionService;
use Illuminate\Support\ServiceProvider;

class TransactionServiceProvider extends ServiceProvider
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
        $this->app->bind(TransactionService::class, function ($app) {
            return new TransactionService($app->make('App\Repositories\Transaction\TransactionInterface'));
        });
    }
}
