<?php

namespace App\Repositories\Transaction;


use Illuminate\Support\ServiceProvider;


class TransactionServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\Transaction\TransactionInterface', 'App\Repositories\Transaction\EloquentTransactionRepository');
    }
}