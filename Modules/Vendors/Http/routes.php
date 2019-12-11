<?php

Route::group(['middleware' => ['web','permission:vendors.browse'],'prefix'=>'vendors','as'=>'vendors.', 'namespace' => 'Modules\Vendors\Http\Controllers'], function () {
    Route::get('/', 'VendorsController@indexRedirect');

    Route::group(['middleware' => ['web','permission:vendors.settings']], function () {
        Route::resource('category', 'Settings\CategoryController');
    });

    Route::resource('vendors', 'VendorsController');

    Route::post('vendors/mass_update', ['as'=>'vendors.mass_update','uses'=> 'VendorsController@massUpdate']);

});
