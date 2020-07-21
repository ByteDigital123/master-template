<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'auth'], function (){
    // Authentication Routes...
    Route::post('login', 'Auth\UserDashboard\LoginController@login');
    Route::post('logout', 'Auth\UserDashboard\LoginController@logout');

    // Password Reset Routes...
    Route::post('password/reset', 'Auth\UserDashboard\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\UserDashboard\ResetPasswordController@showResetForm');

    // Registration Routes...
    Route::post('register/{token?}', 'Auth\UserDashboard\RegisterController@store');

    // Email Verification...
    Route::get('email-verification/{token}', 'Auth\UserDashboard\VerificationController@verifyEmailAddress');
});


// BLOGS
Route::get('/blogs', 'Website\BlogController@index');
Route::get('/blogs/{slug}', 'Website\BlogController@show');

// CONTACT FORMS
Route::post('/contact-form', 'Website\ContactFormController@store');

// COUNTRIES
Route::get('countries', 'Api\CountryController@index');

// PAGES
Route::get('/pages', 'Website\PageController@index');
Route::get('/pages/{slug}', 'Website\PageController@show');


