<?php

namespace App\Providers\Laravel;

use App\Services\CategoriesCourseService;
use Illuminate\Support\ServiceProvider;

class CategoriesCourseServiceProvider extends ServiceProvider
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
        $this->app->bind(CategoriesCourseService::class, function ($app) {
            return new CategoriesCourseService($app->make('App\Repositories\CategoriesCourse\CategoriesCourseInterface'));
        });
    }
}
