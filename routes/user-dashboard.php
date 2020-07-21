<?php

/*
|--------------------------------------------------------------------------
| User Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth:user_api'], function () {

    // CURRENT USER
    Route::get('/auth/current', 'UserDashboard\UserController@currentUser');

    // DELETE ACCOUNT
    Route::delete('delete-account', 'UserDashboard\UserController@destroy');

    // UPDATE PASSWORD
    Route::put('update-password', 'UserDashboard\UserController@updatePassword');

    // TRANSACTIONS
    Route::get('transactions', 'UserDashboard\TransactionController@index');
    Route::get('transactions/{id}', 'UserDashboard\TransactionController@show');



});



