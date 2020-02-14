<?php

namespace App\Providers\Laravel;

use App\Services\CourseService;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
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
        $this->app->bind(CourseService::class, function ($app) {
            return new CourseService($app->make('App\Repositories\Course\CourseInterface'));
        });
    }
}
