<?php

Route::group(['middleware' => ['web', 'permission:campaigns.browse'], 'prefix' => 'campaigns', 'as' => 'campaigns.', 'namespace' => 'Modules\Campaigns\Http\Controllers'], function () {
    Route::get('/', 'CampaignsController@indexRedirect');

    Route::group(['middleware' => ['web', 'permission:campaigns.settings']], function () {
        Route::resource('status', 'Settings\StatusController');
        Route::resource('type', 'Settings\TypeController');
    });

    Route::resource('campaigns', 'CampaignsController');

    Route::resource('emailcampaign', 'EmailCampaignController');

    Route::post('campaigns/mass_update', ['as'=>'campaigns.mass_update','uses'=> 'CampaignsController@massUpdate']);

    Route::get('campaigns/emailcampaign-selection/{entityId}', ['as'=>'emailcampaign.selection','uses'=> 'Tabs\CampaignsEmailCampaignController@selection']);
    Route::get('campaigns/emailcampaign-linked/{entityId}', ['as'=>'emailcampaign.linked','uses'=> 'Tabs\CampaignsEmailCampaignController@linked']);
    Route::post('campaigns/emailcampaign-unlink', ['as'=>'emailcampaign.unlink','uses'=> 'Tabs\CampaignsEmailCampaignController@unlink']);
    Route::post('campaigns/emailcampaign-delete', ['as'=>'emailcampaign.delete','uses'=> 'Tabs\CampaignsEmailCampaignController@delete']);
    Route::post('campaigns/emailcampaign-link', ['as'=>'emailcampaign.link','uses'=> 'Tabs\CampaignsEmailCampaignController@link']);

    Route::get('campaigns/leads-selection/{entityId}', ['as'=>'leads.selection','uses'=> 'Tabs\CampaignsLeadController@selection']);
    Route::get('campaigns/leads-linked/{entityId}', ['as'=>'leads.linked','uses'=> 'Tabs\CampaignsLeadController@linked']);
    Route::post('campaigns/leads-unlink', ['as'=>'leads.unlink','uses'=> 'Tabs\CampaignsLeadController@unlink']);
    Route::post('campaigns/leads-link', ['as'=>'leads.link','uses'=> 'Tabs\CampaignsLeadController@link']);

    Route::get('campaigns/contacts-selection/{entityId}', ['as'=>'contacts.selection','uses'=> 'Tabs\CampaignsContactsController@selection']);
    Route::get('campaigns/contacts-linked/{entityId}', ['as'=>'contacts.linked','uses'=> 'Tabs\CampaignsContactsController@linked']);
    Route::post('campaigns/contacts-unlink', ['as'=>'contacts.unlink','uses'=> 'Tabs\CampaignsContactsController@unlink']);
    Route::post('campaigns/contacts-link', ['as'=>'contacts.link','uses'=> 'Tabs\CampaignsContactsController@link']);

    Route::get('campaigns/deals-selection/{entityId}', ['as'=>'deals.selection','uses'=> 'Tabs\CampaignsDealsController@selection']);
    Route::get('campaigns/deals-linked/{entityId}', ['as'=>'deals.linked','uses'=> 'Tabs\CampaignsDealsController@linked']);
    Route::post('campaigns/deals-unlink', ['as'=>'deals.unlink','uses'=> 'Tabs\CampaignsDealsController@unlink']);
    Route::post('campaigns/deals-link', ['as'=>'deals.link','uses'=> 'Tabs\CampaignsDealsController@link']);

    Route::get('campaigns/accounts-selection/{entityId}', ['as'=>'accounts.selection','uses'=> 'Tabs\CampaignsAccountsController@selection']);
    Route::get('campaigns/accounts-linked/{entityId}', ['as'=>'accounts.linked','uses'=> 'Tabs\CampaignsAccountsController@linked']);
    Route::post('campaigns/accounts-unlink', ['as'=>'accounts.unlink','uses'=> 'Tabs\CampaignsAccountsController@unlink']);
    Route::post('campaigns/accounts-link', ['as'=>'accounts.link','uses'=> 'Tabs\CampaignsAccountsController@link']);
});
