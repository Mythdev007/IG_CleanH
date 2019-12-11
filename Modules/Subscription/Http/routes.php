<?php

Route::group(['middleware' => ['web', 'permission:company.settings'], 'prefix' => 'subscription', 'as' => 'subscription.', 'namespace' => 'Modules\Subscription\Http\Controllers'], function () {

    Route::get('/', 'SubscriptionBaseController@index')->name('get');
    Route::get('/subscribe', 'SubscribeController@subscribe')->name('subscribe');
    Route::post('/subscribe', 'SubscribeController@post')->name('subscribe.post');
    Route::get('/board', 'BoardController@get')->name('board');

    Route::post('/payment/stripe', 'Payment\StripePaymentController@process')->name('payment.stripe');
    Route::post('/payment/paypal', 'Payment\PayPalPaymentController@process')->name('payment.paypal');
    Route::get('/payment/paypal-checkout-status', 'Payment\PayPalPaymentController@checkoutStatus')->name('payment.paypal.status');


    Route::post('/payment/cash', 'Payment\CashPaymentController@process')->name('payment.cash');


    Route::get('/invoices', 'InvoicesController@get')->name('invoices.get');
    Route::get('/invoices/download/{id}', 'InvoicesController@download')->name('invoices.download');

});
