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

Route::group([
    'prefix' => 'admin/ahass',
    'as' => 'adm.ahass.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'AhassController@index')->name('index');
    Route::get('/tambah', 'AhassController@create')->name('create');
    Route::post('/tambah', 'AhassController@store')->name('store');
    Route::get('/{id}/preview', 'AhassController@show')->name('show');
    Route::get('/{id}/edit', 'AhassController@edit')->name('edit');
    Route::put('/{id}', 'AhassController@update')->name('update');
    Route::delete('/{id}', 'AhassController@destroy')->name('destroy');
});