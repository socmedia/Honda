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
    'prefix' => 'admin/banner',
    'as' => 'adm.banner.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'BannerController@index')->name('index');
    Route::get('/tambah', 'BannerController@create')->name('create');
    Route::get('/{id}/edit', 'BannerController@edit')->name('edit');
    Route::get('/export/excel', 'BannerController@exportAsExcel')->name('export.excel');
});