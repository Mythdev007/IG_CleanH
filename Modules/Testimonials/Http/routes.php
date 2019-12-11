<?php

Route::group(['middleware' => ['web', 'permission:testimonials.browse'], 'prefix' => 'testimonials', 'as' => 'testimonials.', 'namespace' => 'Modules\Testimonials\Http\Controllers'], function () {

    Route::get('/', 'TestimonialsController@indexRedirect');

    Route::group(['middleware' => ['web', 'permission:testimonials.settings']], function () {
        Route::resource('nps_type', 'Settings\NpsTypeController');
        Route::resource('product_group', 'Settings\ProductGroupController');
        Route::resource('status_type', 'Settings\StatusTypeController');
        Route::resource('usage_type', 'Settings\UsageTypeController');
        Route::resource('vip_type', 'Settings\VipTypeController');
    });

    Route::resource('testimonials', 'TestimonialsController');

    Route::post('testimonials/mass_update', ['as'=>'testimonials.mass_update','uses'=> 'TestimonialsController@massUpdate']);

});
