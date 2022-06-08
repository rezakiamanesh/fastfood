<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:web'], 'prefix' => 'panel'], function () {
    Route::group(['middleware' => ['isUser'], 'namespace' => 'Users', 'prefix' => 'users'], function () {


        Route::get('/', 'HomeController@index')->name('users.dashboard.index');


        // ================================================= Start Of orders =============
        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'OrderController@index')->name('users.panel.order.index');
        });
        // ================================================= End Of orders =============

        // ================================================= Start Of users-profile =============
        Route::group(['prefix' => 'users-profile'], function () {
            Route::get('/', 'UserProfileController@index')->name('users.panel.profile');
            Route::post('/update', 'UserProfileController@update')->name('users.panel.profileUpdate');
            Route::get('/changePw/', 'UserProfileController@ChangePwFrom')->name('users.panel.changePwFrom');
            Route::post('/changePw/', 'UserProfileController@ChangePw')->name('users.change.password');
            Route::get('/address', 'UserProfileController@addressUser')->name('users.panel.address');
            Route::post('/address/store', 'UserProfileController@StoreAddress')->name('users.panel.storeAddress');
            Route::get('/address/delete/{id}', 'UserProfileController@DeleteAddress')->name('users.delete.address');
            Route::post('/ajaxCity', 'UserProfileController@ajaxCity')->name('users.panel.profile.ajaxCity');
        });
        // ================================================= End Of users-profile =============



    });
});

