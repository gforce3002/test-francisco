<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->group(function () {

    Route::prefix('profile')->group(function () {
        Route::get('/', 'Api\ProfileController@get');
        Route::put('/', 'Api\ProfileController@update');
    });

    Route::prefix('password')->group(function () {
        Route::put('/', 'Api\ProfileController@updatePassword');
    });

    Route::prefix('user')->group(function () {
        Route::post('/', 'Api\UserController@create')->middleware('role:admin');
        Route::get('/', 'Api\UserController@getList')->middleware('role:admin');
        Route::get('/{id}', 'Api\UserController@get')->middleware('role:admin');
        Route::put('/{id}', 'Api\UserController@update')->middleware('role:admin');
        Route::delete('/{id}', 'Api\UserController@remove')->middleware('role:admin');
    });

    Route::prefix('/role')->group(function () {
        Route::get('/', 'Api\RoleController@getList');
    });

    Route::prefix('/api')->group(function () {
        Route::get('/', 'Api\ApiController@getList');
        Route::delete('/{id}', 'Api\ApiController@remove');
        Route::post('/', 'Api\ApiController@create');
    });
});
