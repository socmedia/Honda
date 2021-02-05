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
    'prefix' => 'admin/apparel',
    'as' => 'adm.apparel.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'ApparelController@index')->name('index');
    Route::get('/tambah', 'ApparelController@create')->name('create');
    Route::post('/tambah', 'ApparelController@store')->name('store');
    Route::get('/{id}/preview', 'ApparelController@show')->name('show');
    Route::get('/{id}/edit', 'ApparelController@edit')->name('edit');
    Route::put('/{id}', 'ApparelController@update')->name('update');
    Route::delete('/{id}', 'ApparelController@destroy')->name('destroy');
    Route::get('/export/excel', 'ApparelController@exportAsExcel')->name('export.excel');
});