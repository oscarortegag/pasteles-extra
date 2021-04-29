<?php

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


Route::get('/', 'pastelesController@index')->name('pasteles');
Route::get('/editarP/{id}', 'pastelesController@edit')->name('editarPa');
Route::get('/editarD/{id}', 'descController@edit')->name('editarDe');
Route::get('/verP/{id}', 'pastelesController@show')->name('verPa');
Route::get('/verD/{id}', 'descController@show')->name('verDe');
Route::resource('/pastelesR', 'pastelesController');
Route::resource('/descP', 'descController');