<?php

namespace App\Providers\Laravel;

use App\Services\CategoryService;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make('App\Repositories\Category\CategoryInterface'));
        });
    }
}
