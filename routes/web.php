<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::middleware('auth')->group(function() {
    Route::get('/', 'DashboardController@index');
    Route::get('/home', 'DashboardController@index');

    Route::prefix('/users')->group(function() {
        Route::get('/', 'UsersController@index')->middleware('permission:user-index');
        Route::get('/create', 'UsersController@create')->middleware('permission:user-edit');
        Route::get('/{id}', 'UsersController@get')->middleware('permission:user-edit');
    });

    Route::prefix('/coverages')->group(function() {
        Route::get('/', 'CoveragesController@index')->middleware('permission:coverage-index');
        Route::get('/create', 'CoveragesController@create')->middleware('permission:coverage-edit');
        Route::get('/{id}', 'CoveragesController@get')->middleware('permission:coverage-edit');
    });

    Route::prefix('/api')->group(function () {
        Route::get('/', 'ApiController@index');
        Route::get('/create', 'ApiController@create');
    });

    Route::get('/profile', 'ProfileController@index');
    Route::get('/password', 'ProfileController@password');
});

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return response()->redirectTo('/');
})->middleware('auth');
