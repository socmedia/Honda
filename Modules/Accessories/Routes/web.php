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
    'prefix' => 'admin/accessories',
    'as' => 'adm.accessories.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'AccessoriesController@index')->name('index');
    Route::get('/tambah', 'AccessoriesController@create')->name('create');
    Route::post('/tambah', 'AccessoriesController@store')->name('store');
    Route::get('/{id}/preview', 'AccessoriesController@show')->name('show');
    Route::get('/{id}/edit', 'AccessoriesController@edit')->name('edit');
    Route::put('/{id}', 'AccessoriesController@update')->name('update');
    Route::delete('/{id}', 'AccessoriesController@destroy')->name('destroy');
    Route::get('/export/excel', 'AccessoriesController@exportAsExcel')->name('export.excel');
});