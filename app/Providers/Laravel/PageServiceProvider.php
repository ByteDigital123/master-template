<?php

namespace App\Providers\Laravel;

use App\Services\PageService;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
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
        $this->app->bind(PageService::class, function ($app) {
            return new PageService($app->make('App\Repositories\Page\PageInterface'));
        });
    }
}
