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
    'prefix' => 'admin/artikel',
    'as' => 'adm.article.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'ArticleController@index')->name('index');
    Route::get('/tambah', 'ArticleController@create')->name('create');
    Route::post('/tambah', 'ArticleController@store')->name('store');
    Route::get('/{slugTitle}', 'ArticleController@show')->name('show');
    Route::get('/{slugTitle}/edit', 'ArticleController@edit')->name('edit');
    Route::put('/{id}', 'ArticleController@update')->name('update');
    Route::delete('/{id}', 'ArticleController@destroy')->name('destroy');
});