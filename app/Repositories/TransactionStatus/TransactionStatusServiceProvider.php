<?php

namespace App\Repositories\TransactionStatus;


use Illuminate\Support\ServiceProvider;


class TransactionStatusServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\TransactionStatus\TransactionStatusInterface', 'App\Repositories\TransactionStatus\EloquentTransactionStatusRepository');
    }
}