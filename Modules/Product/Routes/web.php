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
    'prefix' => 'admin/produk',
    'as' => 'adm.product.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/tambah', 'ProductController@create')->name('create');
    Route::post('/tambah', 'ProductController@store')->name('store');
    Route::get('/{id}/edit', 'ProductController@edit')->name('edit');
});