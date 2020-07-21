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
});

Route::group(['middleware' => 'auth:admin_api'], function () {

    // ADMIN ROUTES
    Route::get('admin-users', 'Api\AdminUserController@index');
    Route::get('admin-users/{id}', 'Api\AdminUserController@show');
    Route::post('admin-users', 'Api\AdminUserController@store');
    Route::put('admin-users/{id}', 'Api\AdminUserController@update');
    Route::delete('admin-users', 'Api\AdminUserController@destroy');

    // BLOGS
    Route::get('blogs', 'Api\BlogController@index');
    Route::get('blogs/{id}', 'Api\BlogController@show');
    Route::post('blogs', 'Api\BlogController@store');
    Route::put('blogs/{id}', 'Api\BlogController@update');
    Route::delete('blogs', 'Api\BlogController@destroy');

    // CONTACT FORMS
    Route::get('contact-forms', 'Api\ContactFormController@index');
    Route::get('contact-forms/{id}', 'Api\ContactFormController@show');
    Route::put('contact-forms/{id}', 'Api\ContactFormController@update');
    Route::delete('contact-forms', 'Api\ContactFormController@destroy');

    // COUNTRIES
    Route::get('countries', 'Api\CountryController@index');
    Route::get('countries/{id}', 'Api\CountryController@show');
    Route::put('countries/{id}', 'Api\CountryController@update');
    Route::delete('countries', 'Api\CountryController@destroy');

    // PAGES
    Route::get('pages', 'Api\PageController@index');
    Route::get('pages/{id}', 'Api\PageController@show');
    Route::post('pages', 'Api\PageController@store');
    Route::put('pages/{id}', 'Api\PageController@update');
    Route::delete('pages', 'Api\PageController@destroy');

    // FILE UPLOAD
    Route::post('file-upload', 'Api\ImageController@createFile');

    // TRANSACTIONS
    Route::get('transactions', 'Api\TransactionController@index');
    Route::get('transactions/{id}', 'Api\TransactionController@show');
    Route::put('transactions/{id}', 'Api\TransactionController@update');
    Route::delete('transactions', 'Api\TransactionController@destroy');

    // TRANSACTION STATUSES
    Route::get('transaction-statuses', 'Api\TransactionController@index');
    Route::get('transaction-statuses/{id}', 'Api\TransactionController@show');
    Route::get('transaction-statuses', 'Api\TransactionController@store');
    Route::put('transaction-statuses/{id}', 'Api\TransactionController@update');
    Route::delete('transaction-statuses', 'Api\TransactionController@destroy');

    // USER ENDPOINTS
    Route::get('auth/current', 'Api\AdminUserController@currentUser');

});


