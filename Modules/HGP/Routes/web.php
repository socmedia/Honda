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
    'prefix' => 'admin/genuine-parts',
    'as' => 'adm.hgp.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'HGPController@index')->name('index');
    Route::get('/tambah', 'HGPController@create')->name('create');
    Route::post('/tambah', 'HGPController@store')->name('store');
    Route::get('/{id}/preview', 'HGPController@show')->name('show');
    Route::get('/{id}/edit', 'HGPController@edit')->name('edit');
    Route::put('/{id}', 'HGPController@update')->name('update');
    Route::delete('/{id}', 'HGPController@destroy')->name('destroy');
    Route::get('/{id}/edit/keunggulan', 'HGPController@editAdvantage')->name('edit.advantage');
    Route::post('/{id}/edit/keunggulan/tambah', 'HGPController@storeAdvantage')->name('store.advantage');
    Route::put('/{id}/edit/keunggulan/{advantageId}', 'HGPController@updateAdvantage')->name('update.advantage');
    Route::delete('/{id}/edit/keunggulan/{advantageId}', 'HGPController@destroyAdvantage')->name('destroy.advantage');
    Route::get('/export/excel', 'HGPController@exportAsExcel')->name('export.excel');
});