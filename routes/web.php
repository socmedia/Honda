<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('comingsoon');
    return view('pages/index');
    // return Regency::with('district', 'province')->get();
});

Route::group(['prefix' => 'produk'], function () {
    Route::get('/', function () {
        return view('pages.product.index');
    });
    Route::get('/detail', function () {
        return view('pages.product.detail.index');
    });

});

Route::get('/media/banner/{bannerName}', ['App\Http\Controllers\Media\MediaController', 'getBanner'])->name('get.banner');
Route::get('/media/product/{productName}', ['App\Http\Controllers\Media\MediaController', 'getProductImage'])->name('get.product');
Route::get('/media/honda/genuine_parts/{imageName}', ['App\Http\Controllers\Media\MediaController', 'getGenuinePartImage'])->name('get.genuine_part');
Route::get('/media/honda/apparels/{imageName}', ['App\Http\Controllers\Media\MediaController', 'getApparelImage'])->name('get.apparel');
Route::get('/media/honda/accessories/{imageName}', ['App\Http\Controllers\Media\MediaController', 'getAccessoryImage'])->name('get.accessory');