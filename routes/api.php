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
        Route::post('/', 'Api\UserController@create')->middleware('permission:user-edit');
        Route::get('/', 'Api\UserController@getList')->middleware('permission:user-index');
        Route::get('/{id}', 'Api\UserController@get')->middleware('permission:user-index');
        Route::put('/{id}', 'Api\UserController@update')->middleware('permission:user-edit');
        Route::delete('/{id}', 'Api\UserController@remove')->middleware('permission:user-edit');
    });

    Route::prefix('coverage')->group(function () {
        Route::post('/', 'Api\CoverageController@create')->middleware('permission:coverage-edit');
        Route::get('/', 'Api\CoverageController@getList')->middleware('permission:coverage-index');
        Route::get('/{id}', 'Api\CoverageController@get')->middleware('permission:coverage-index');
        Route::put('/{id}', 'Api\CoverageController@update')->middleware('permission:coverage-edit');
        Route::delete('/{id}', 'Api\CoverageController@remove')->middleware('permission:coverage-edit');
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
