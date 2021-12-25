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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1/todo/updateStatus', 'API\TodoController@updateStatus');
Route::post('/v1/todo/deleteStatus', 'API\TodoController@deleteStatus');
Route::post('/v1/todo/searchStatus', 'API\TodoController@searchStatus');
Route::post('/v1/todo/export', 'API\TodoController@export');