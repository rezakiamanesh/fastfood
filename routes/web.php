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

Route::group(['namespace' => '\App\Http\Controllers\site'], function () {
    Route::get('/','SiteController@index')->name('site.index');
    Route::get('/product/{slug?}','SiteController@product')->name('site.product');
    Route::post('/save-comment/{id}','SiteController@commentStore')->name('site.comment.store');

});

Auth::routes();
Route::group(['namespace' => '\App\Http\Controllers\Auth'], function () {
Route::get('/logout','LoginController@logout')->name('logout');
});

