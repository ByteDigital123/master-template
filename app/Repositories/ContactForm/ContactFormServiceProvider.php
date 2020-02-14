<?php

namespace App\Repositories\ContactForm;


use Illuminate\Support\ServiceProvider;


class ContactFormServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\ContactForm\ContactFormInterface', 'App\Repositories\ContactForm\EloquentContactFormRepository');
    }
}