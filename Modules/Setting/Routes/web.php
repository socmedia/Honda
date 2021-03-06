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
    'prefix' => 'admin/pengaturan',
    'as' => 'adm.setting.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'SettingController@index')->name('index');
});