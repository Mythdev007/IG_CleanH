<?php

Route::group(['middleware' => ['web', 'permission:calls.browse'], 'prefix' => 'calls', 'as' => 'calls.', 'namespace' => 'Modules\Calls\Http\Controllers'], function () {
    Route::get('/','CallsController@indexRedirect');

    Route::group(['middleware' => ['web', 'permission:calls.settings']], function () {

        Route::resource('directiontype', 'Settings\DirectionTypeController');
        Route::resource('status', 'Settings\CallStatusController');

    });

    Route::resource('calls', 'CallsController');

    Route::post('calls/mass_update', ['as'=>'calls.mass_update','uses'=> 'CallsController@massUpdate']);

});
