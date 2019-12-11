<?php

Route::group(['middleware' => ['web', 'permission:contacts.browse'], 'prefix' => 'contactwebsites', 'as' => 'contactwebsites.', 'namespace' => 'Modules\ContactWebsites\Http\Controllers'], function () {
    Route::get('/', 'ContactWebsitesController@indexRedirect');

    Route::resource('contactwebsites', 'ContactWebsitesController');
});
