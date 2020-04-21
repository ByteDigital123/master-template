<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'auth'], function (){
    // Authentication Routes...
    Route::post('login', 'Auth\Api\LoginController@login');
    Route::post('logout', 'Auth\Api\LoginController@logout');
    // Password Reset Routes...
    Route::post('password/email', 'Auth\Api\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'Auth\Api\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'Auth\Api\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\Api\ResetPasswordController@showResetForm');
    // Registration Routes...
    Route::post('register', 'Auth\Api\RegisterController@store');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth:admin_api'], function () {

    Route::get('admin-users', 'Api\AdminUserController@index');
    Route::get('admin-users/{id}', 'Api\AdminUserController@show');
    Route::post('admin-users', 'Api\AdminUserController@store');
    Route::put('admin-users/{id}', 'Api\AdminUserController@update');
    Route::delete('admin-users', 'Api\AdminUserController@destroy');

    Route::get('courses', 'Api\CourseController@index');
    Route::get('courses/{id}', 'Api\CourseController@show');
    Route::post('courses', 'Api\CourseController@store');
    Route::put('courses/{id}', 'Api\CourseController@update');
    Route::delete('courses', 'Api\CourseController@destroy');

    Route::get('transactions', 'Api\TransactionController@index');
    Route::get('transactions/{id}', 'Api\TransactionController@show');
    Route::put('transactions/{id}', 'Api\TransactionController@update');

    Route::get('contact-forms', 'Api\ContactFormController@index');
    Route::get('contact-forms/{id}', 'Api\ContactFormController@show');
    Route::put('contact-forms/{id}', 'Api\ContactFormController@update');
    Route::delete('contact-forms', 'Api\ContactFormController@destroy');

    Route::get('users', 'Api\UserController@index');
    Route::get('users/{id}', 'Api\UserController@show');
    Route::post('users', 'Api\UserController@store');
    Route::put('users/{id}', 'Api\UserController@update');
    Route::delete('users', 'Api\UserController@destroy');

});


