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
    'prefix' => 'admin/dealer',
    'as' => 'adm.dealer.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'DealerController@index')->name('index');
    Route::get('/tambah', 'DealerController@create')->name('create');
    Route::post('/tambah', 'DealerController@store')->name('store');
    Route::get('/{id}/preview', 'DealerController@show')->name('show');
    Route::get('/{id}/edit', 'DealerController@edit')->name('edit');
    Route::put('/{id}', 'DealerController@update')->name('update');
    Route::delete('/{id}', 'DealerController@destroy')->name('destroy');
    Route::get('/export/excel', 'DealerController@exportAsExcel')->name('export.excel');
});