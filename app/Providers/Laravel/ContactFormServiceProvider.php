<?php

namespace App\Providers\Laravel;

use App\Services\ContactFormService;
use Illuminate\Support\ServiceProvider;

class ContactFormServiceProvider extends ServiceProvider
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
        $this->app->bind(ContactFormService::class, function ($app) {
            return new ContactFormService($app->make('App\Repositories\ContactForm\ContactFormInterface'));
        });
    }
}
