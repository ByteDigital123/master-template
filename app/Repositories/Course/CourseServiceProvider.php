<?php

namespace App\Repositories\Course;


use Illuminate\Support\ServiceProvider;


class CourseServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\Course\CourseInterface', 'App\Repositories\Course\EloquentCourseRepository');
    }
}