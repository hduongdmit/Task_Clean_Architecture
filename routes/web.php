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

Route::get('/', 'TaskController@index');
Route::post('/create', 'TaskController@create');
Route::post('/change_status', 'TaskController@changeStatus');
Route::post('/clear', 'TaskController@clear');
Route::post('/clear_all', 'TaskController@clearAll');
