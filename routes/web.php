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

Route::get('/', 'CosmonautController@index')->name('cosmonaut.index');
Route::get('/show/{id}', 'CosmonautController@show')->name('cosmonaut.show');
Route::get('/create', 'CosmonautController@create')->name('cosmonaut.create');
Route::post('/create', 'CosmonautController@store')->name('cosmonaut.store');
Route::get('/delete/{id}', 'CosmonautController@delete')->name('cosmonaut.delete');
Route::get('/edit/{id}', 'CosmonautController@edit')->name('cosmonaut.edit');
Route::post('/edit/{id}', 'CosmonautController@update')->name('cosmonaut.update');
