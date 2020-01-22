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


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Auth\UserDashboard\LoginController@login');
    Route::post('user-register', 'Auth\UserDashboard\RegisterController@create');
    Route::post('forgot-password', 'Auth\UserDashboard\PasswordResetController@sendPasswordResetToken');
    Route::post('reset-password', 'Auth\UserDashboard\PasswordResetController@resetPassword');
});
