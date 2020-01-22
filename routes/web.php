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


Route::group(['prefix' => 'auth', 'middleware' => 'api'], function (){
    // Authentication Routes...
    Route::get('login', 'Auth\UserDashboard\LoginController@showLoginForm');
    Route::post('login', 'Auth\UserDashboard\LoginController@login');
    Route::post('logout', 'Auth\UserDashboard\LoginController@logout');
    // Password Reset Routes...
    Route::post('password/email', 'Auth\UserDashboard\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'Auth\UserDashboard\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'Auth\UserDashboard\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\UserDashboard\ResetPasswordController@showResetForm');
    // Registration Routes...
    Route::get('register', 'Auth\UserDashboard\RegisterController@showRegistrationForm');
});

Route::get('/home', 'HomeController@index')->name('home');




Route::get('testing', function (){
     dd(Auth::user());
});
