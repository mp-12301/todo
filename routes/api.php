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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', 'Auth\LoginController@login');
Route::post('auth/logout', 'Auth\LoginController@logout');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('tasks', 'TaskController@index');
    Route::get('tasks/{task}', 'TaskController@show');
    Route::post('tasks', 'TaskController@store');
    Route::put('tasks/{task}', 'TaskController@update');
    Route::delete('tasks/{task}', 'TaskController@delete');

    Route::get('labels', 'LabelController@index');
    Route::get('labels/{label}', 'LabelController@show');
    Route::post('labels', 'LabelController@store');
    Route::put('labels/{label}', 'LabelController@update');
    Route::delete('labels/{label}', 'LabelController@delete');
});