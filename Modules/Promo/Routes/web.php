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
    'prefix' => 'admin/promo-event',
    'as' => 'adm.promo.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'PromoController@index')->name('index');
    Route::get('/tambah', 'PromoController@create')->name('create');
    Route::post('/tambah', 'PromoController@store')->name('store');
    Route::get('/{slugTitle}', 'PromoController@show')->name('show');
    Route::get('/{slugTitle}/edit', 'PromoController@edit')->name('edit');
    Route::put('/{id}', 'PromoController@update')->name('update');
    Route::delete('/{id}', 'PromoController@destroy')->name('destroy');
});