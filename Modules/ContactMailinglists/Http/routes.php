<?php
Route::group(['middleware' => ['web', 'permission:contacts.browse'], 'prefix' => 'contactmailinglists', 'as' => 'contactmailinglists.', 'namespace' => 'Modules\ContactMailinglists\Http\Controllers'], function () {
    Route::get('/', 'ContactMailinglistsController@indexRedirect');

    Route::group(['middleware' => ['web', 'permission:contactmailinglists.settings']], function () {
    });

    Route::resource('contactmailinglists', 'ContactMailinglistsController');

    Route::post('contactmailinglists/mass_update', ['as' => 'contactmailinglists.mass_update', 'uses' => 'ContactMailinglistsController@massUpdate']);
});