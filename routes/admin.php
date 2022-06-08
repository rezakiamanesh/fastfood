<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:web'], 'prefix' => 'panel'], function () {

    // Manager Route ...
    Route::group(['middleware' => ['checkAdmin'], 'prefix' => 'manager'], function () {


        //================================================== dashboard =============
        Route::get('/', 'AdminController@dashboard')->name('panel.dashboard.index');
        //================================================== dashboard =============




        /* start orders controller */
        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'OrderController@index')->name('panel.order.index');
            Route::post('shipping-code/{id}', 'OrderController@shippingCode')->name('panel.shipping.code');
            Route::post('print', 'OrderController@print')->name('panel.order.print');
            Route::post('status-sending', 'OrderController@changeStatus')->name('panel.order.changeSending');
            Route::get('sending', 'OrderController@sendingOrder')->name('panel.order.sending');
            Route::get('canceled', 'OrderController@canceledOrder')->name('panel.order.canceled');
            Route::get('unpaid', 'OrderController@unpaidOrder')->name('panel.order.unpaid');
            Route::get('pending', 'OrderController@pendingOrder')->name('panel.order.pending');
            Route::delete('delete/{id}', 'OrderController@delete')->name('panel.order.delete');
            Route::get('search', 'OrderController@orderSearch')->name('user.order-search');
            Route::get('{status}/status/{id}', 'OrderController@status')->name('panel.order.status');
        });
        /* end orders controller */


        /* start product controller */
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductController@index')->name('panel.product.index');
            Route::get('create', 'ProductController@create')->name('panel.product.create');
            Route::post('store', 'ProductController@store')->name('panel.product.store');
            Route::get('edit/{id}', 'ProductController@edit')->name('panel.product.edit');
            Route::PATCH('update/{id}', 'ProductController@update')->name('panel.product.update');
            Route::delete('delete/{id}', 'ProductController@delete')->name('panel.product.delete');
            Route::get('status/{id}', 'ProductController@status')->name('panel.product.status');
            Route::post('ajax-attributes', 'ProductController@ajax_attributes')->name('panel.product.ajax_attributes');
            Route::post('ajax-attributes-type-value', 'ProductController@ajax_attributes_type_value')->name('panel.product.ajax_attributes_type_value');
            /* color or size */
            Route::post('ajax-attributes-variations', 'ProductController@ajax_attributes_variations')->name('panel.product.ajax_attributes_variations');
            /* color or size */
        });
        /* end product controller */


        /* start category controller */
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', 'CategoryController@index')->name('panel.category.index');
            Route::post('save-nested-categories', 'CategoryController@saveNestedCategories')->name('panel.nested-categories.store');
            Route::get('/create', 'CategoryController@create')->name('panel.category.create');
            Route::post('/store', 'CategoryController@store')->name('panel.category.store');
            Route::get('/edit/{id}', 'CategoryController@edit')->name('panel.category.edit');
            Route::PATCH('/update/{id}', 'CategoryController@update')->name('panel.category.update');
            Route::get('/delete/{id}', 'CategoryController@delete')->name('panel.category.delete');
            Route::post('/getOtherCategories', 'CategoryController@getOtherCategories')->name('panel.category.getOtherCategories');

            Route::get('/attributed/{id}', 'CategoryController@attributedForm')->name('panel.category.attributedForm');
            Route::post('/attributed/{id}', 'CategoryController@attributed')->name('panel.category.attributed');

        });
        /* end category controller */

        // ================================================= profile =============
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'ProfileController@index')->name('panel.profile.index');
            Route::get('/edit/{id}', 'ProfileController@edit')->name('panel.profile.edit');
            Route::post('/changepw/', 'ProfileController@ChangePw')->name('panel.profile.changePassword');
            Route::PATCH('/update/{id}', 'ProfileController@update')->name('panel.profile.update');
            Route::post('/update-avatar/', 'ProfileController@avatar')->name('panel.profile.avatar');
            Route::post('/ajaxGetCity/', 'ProfileController@ajaxGetCity')->name('panel.profile.ajaxCity');
            Route::post('/address/{id}', 'ProfileController@addressStore')->name('panel.address.add');
            Route::get('/delete/address/{id}', 'ProfileController@addressDelete')->name('panel.address.delete');

        });
        // ================================================= profile =============


        // ================================================= user =============
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UserController@index')->name('panel.users.index');
            Route::get('/create', 'UserController@create')->name('panel.users.create');
            Route::post('/store', 'UserController@store')->name('panel.users.store');
            Route::get('/edit/{id}', 'UserController@edit')->name('panel.users.edit');
            Route::PATCH('/update/{id}', 'UserController@update')->name('panel.users.update');
            Route::delete('/delete/{id}', 'UserController@delete')->name('panel.users.delete');
            Route::get('/active/{id}', 'UserController@active')->name('panel.users.active');
            Route::get('/status/{id}', 'UserController@status')->name('panel.users.status');
            Route::get('/search', 'UserController@Search')->name('panel.users.search');
            Route::get('/show/{user}', 'UserController@showDetail')->name('panel.users.showDetail');
            Route::get('export/', 'UserController@export')->name('panel.users.export');
            Route::post('/edit-profile/{user}', 'UserController@updateUserDetail')->name('panel.users.detailUpdate');

        });
        // ================================================= user =============

        // ================================================= role =============
        Route::group(['prefix' => 'role'], function () {
            Route::get('/', 'RoleController@index')->name('panel.role.index');
            Route::get('/create', 'RoleController@create')->name('panel.role.create');
            Route::post('/store', 'RoleController@store')->name('panel.role.store');
            Route::get('/edit/{id}', 'RoleController@edit')->name('panel.role.edit');
            Route::PATCH('/update/{id}', 'RoleController@update')->name('panel.role.update');
            Route::delete('/delete/{id}', 'RoleController@delete')->name('panel.role.delete');
            Route::get('/active/{id}', 'RoleController@active')->name('panel.role.active');

        });
        // ================================================= role =============

        // ================================================= LevelManage =============
        Route::group(['prefix' => 'LevelManage'], function () {
            Route::get('/', 'LevelManageController@index')->name('panel.LevelManage.index');
            Route::get('/create', 'LevelManageController@create')->name('panel.LevelManage.create');
            Route::post('/store', 'LevelManageController@store')->name('panel.LevelManage.store');
            Route::get('/edit/{user}', 'LevelManageController@edit')->name('panel.LevelManage.edit');
            Route::PATCH('/update/{user}', 'LevelManageController@update')->name('panel.LevelManage.update');
            Route::delete('/delete/{user}', 'LevelManageController@destroy')->name('panel.LevelManage.delete');
        });
        // ================================================= LevelManage =============

        // ================================================= permission =============
        Route::group(['prefix' => 'permission'], function () {
            Route::get('/', 'PermissionController@index')->name('panel.permission.index');
            Route::get('/create', 'PermissionController@create')->name('panel.permission.create');
            Route::post('/store', 'PermissionController@store')->name('panel.permission.store');
            Route::get('/updateToDate', 'PermissionController@updateToDate')->name('panel.permission.updateToDate');
            Route::get('/edit/{id}', 'PermissionController@edit')->name('panel.permission.edit');
            Route::PATCH('/update/{id}', 'PermissionController@update')->name('panel.permission.update');
        });
        // ================================================= permission =============

        // ================================================= comments =============
        Route::group(['prefix' => 'comments'], function () {
            Route::get('/', 'CommentController@index')->name('panel.comments.index');
            Route::get('/status/{id}', 'CommentController@status')->name('panel.comments.status');
            Route::delete('/delete/{id}', 'CommentController@delete')->name('panel.comments.delete');
        });
        // ================================================= comments =============


    });

});
