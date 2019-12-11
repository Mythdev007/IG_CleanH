<?php

Route::group(['middleware' => ['web', 'permission:invoices.browse'], 'prefix' => 'invoices', 'as' => 'invoices.', 'namespace' => 'Modules\Invoices\Http\Controllers'], function () {
    Route::get('/', 'InvoicesController@indexRedirect');

    Route::group(['middleware' => ['web', 'permission:invoices.settings']], function () {

        Route::resource('status', 'Settings\StatusController');
        Route::resource('recurring-period', 'Settings\RecurringPeriodController');

        Route::get('settings', ['as' => 'settings.show', 'uses' => 'Settings\InvoiceSettingsController@show']);
        Route::post('settings', ['as' => 'settings.update', 'uses' => 'Settings\InvoiceSettingsController@update']);

    });

    Route::get('invoices/print/{id}', 'InvoicesController@printInvoice')->name('invoices.print');

    Route::resource('invoices', 'InvoicesController');

    Route::post('invoices/mass_update', ['as' => 'invoices.mass_update', 'uses' => 'InvoicesController@massUpdate']);


    Route::post('company-settings', 'InvoicesController@companySettings');

    Route::post('copy-account', 'InvoicesController@copyDataFromAccount');

    Route::post('load-product', 'InvoicesController@loadProduct');


});
