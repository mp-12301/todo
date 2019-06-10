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
    Route::get('tasks/{task}', 'TaskController@show')
        ->middleware('can:view,task');
    Route::post('tasks', 'TaskController@store');
    Route::put('tasks/{task}', 'TaskController@update')
        ->middleware('can:update,task');
    Route::delete('tasks/{task}', 'TaskController@delete')
        ->middleware('can:delete,task');
    Route::post('tasks/{task}/{label}', 'TaskController@addLabel')
        ->middleware('can:manageLabels,task,label');
    Route::delete('tasks/{task}/{label}', 'TaskController@removeLabel')
        ->middleware('can:manageLabels,task,label');

    Route::get('labels', 'LabelController@index');
    Route::get('labels/{label}', 'LabelController@show')
        ->middleware('can:view,label');
    Route::post('labels', 'LabelController@store');
    Route::put('labels/{label}', 'LabelController@update')
        ->middleware('can:update,label');
    Route::delete('labels/{label}', 'LabelController@delete')
        ->middleware('can:delete,label');
});