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
    'prefix' => 'admin/lead',
    'as' => 'adm.lead.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'LeadController@index')->name('index');
    Route::get('/{id}/edit', 'LeadController@edit')->middleware('readedLead')->name('edit');
    Route::put('/{id}', 'LeadController@update')->name('update');
    Route::get('/export/excel', 'LeadController@exportAsExcel')->name('export.excel');
});