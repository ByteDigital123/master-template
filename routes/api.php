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

Route::group(['prefix' => 'auth'], function () {
    Route::post('admin-users/login', 'Auth\Admin\LoginController@login');
});

// ADMIN ROUTES
Route::group(['middleware' => 'auth:admin_api'], function () {

    // Admin
    Route::get('admin-users/current', 'Api\AdminUserController@currentUser');
    Route::get('admin-users', 'Api\AdminUserController@index');
    Route::get('admin-users/{admin}', 'Api\AdminUserController@show');
    Route::post('admin-users', 'Api\AdminUserController@store');
    Route::delete('admin-users/', 'Api\AdminUserController@destroy');
    Route::put('admin-users/{admin}', 'Api\AdminUserController@update');

});
