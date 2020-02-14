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

Route::group(['middleware' => 'auth:api'], function () {

        // PUT ALL ADMIN ROUTES IN HERE BASTARD

});


