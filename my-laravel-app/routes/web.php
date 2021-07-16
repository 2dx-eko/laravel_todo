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

Route::get('/', function () {
    return view('welcome');
});
/*
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/todo', 'TodoController@view')->name('todo');
*/

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/todo', 'TodoController@index')->name('todo');
    Route::get('/todo/new', 'TodoController@new')->name('new');
    Route::post('/todo/new', 'TodoController@store')->name('store');
    Route::get('/todo/detail', 'TodoController@detail')->name('detail');
    Route::get('/todo/edit', 'TodoController@edit')->name('edit');
});