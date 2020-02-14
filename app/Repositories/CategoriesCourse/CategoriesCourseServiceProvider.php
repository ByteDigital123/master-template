<?php

namespace App\Repositories\CategoriesCourse;


use Illuminate\Support\ServiceProvider;


class CategoriesCourseServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\CategoriesCourse\CategoriesCourseInterface', 'App\Repositories\CategoriesCourse\EloquentCategoriesCourseRepository');
    }
}