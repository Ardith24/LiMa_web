<?php

use Illuminate\Http\Request;
// use Symfony\Component\Routing\Route;

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

Route::get('sprints', 'SprintController@index_api');
Route::get('sprints/{sprint}', 'SprintController@show_id');
Route::post('sprints', 'SprintController@store');
Route::put('sprints/{sprint}', 'SprintController@update');
Route::delete('sprints/{sprint}', 'SprintController@delete');

Route::get('tasks', 'TaskController@index_api');
Route::get('tasks/{task}', 'TaskController@show_id');
Route::post('tasks', 'TaskController@store');
Route::put('tasks/{task}', 'TaskController@update');
Route::delete('tasks/{sprint}', 'TaskController@delete');