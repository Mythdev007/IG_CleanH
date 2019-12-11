<?php


Route::group(['middleware' => ['web','permission:polizzacar.browse'],'prefix'=>'polizzacar','as'=>'polizzacar.', 'namespace' => 'Modules\PolizzaCar\Http\Controllers'], function () {
    Route::get('/', 'PolizzaCarController@indexRedirect');
    
    Route::group(['middleware' => ['web','permission:polizzacar.settings']], function () {
        Route::resource('category', 'Settings\CategoryController');
        Route::resource('status', 'Settings\PolizzaStatusController');
        Route::resource('works_type', 'Settings\PolizzaWorksTypeController');
        Route::resource('piano_tariffario', 'Settings\PianoTariffarioController');
    });
    
    Route::group(['middleware' => ['web','permission:procurement.browse']], function () {
        Route::resource('procurement', 'Settings\ProcurementController');
        Route::post('polizzacar/procurement/import', ['as'=>'procurement.import','uses'=> 'Settings\ProcurementController@import']);
        Route::post('polizzacar/procurement/import_process', ['as'=>'procurement.import.process','uses'=> 'Settings\ProcurementController@importProcess']);
        
        Route::get('procurement/convert_to_request/{id}', ['as'=>'procurement.convert.to.request','uses'=> 'Settings\ProcurementController@convertToRequest']);
    });
    
    Route::post('polizzacar/polizzacar/import', ['as'=>'polizzacar.import','uses'=> 'PolizzaCarController@import']);
    Route::post('polizzacar/polizzacar/import_process', ['as'=>'polizzacar.import.process','uses'=> 'PolizzaCarController@importProcess']);
    
    Route::resource('polizzacar', 'PolizzaCarController');
    
    Route::get('polizzacar/download-csv/', 'PolizzaCarController@downloadCsv')->name('polizzacar.downloadCsv');
    
    Route::get('polizzacar/approve/{id}', 'PolizzaCarController@approvePolizzaCar')->name('polizzacar.approve');

    Route::get('polizzacar/print/{id}', 'PolizzaCarController@printPolizzaCar')->name('polizzacar.print');

    Route::get('polizzacar/printCertificato/{id}', 'PolizzaCarController@printCertificatoPolizzaCar')->name('polizzacar.printCertificato');
    
    Route::get('polizzacar/sendToContractor/{id}', 'PolizzaCarController@sendToContractorPolizzaCar')->name('polizzacar.sendToContractor');
    Route::get('polizzacar/signAndAccept/{id}', 'PolizzaCarController@signAndAcceptPolizzaCar')->name('polizzacar.signAndAccept');
    Route::post('polizzacar/uploadPDFfiles', 'PolizzaCarController@uploadPDFfilesPolizzaCar')->name('polizzacar.uploadPDFfiles');

    Route::get('polizzacar/send_order/{id}', 'PolizzaCarController@sendOrderPolizzaCar')->name('polizzacar.sendOrder');

    Route::post('copy-from-procurement', 'PolizzaCarController@copyDataFromProcurement');

    Route::post('getTariffa', 'PolizzaCarController@getTariffa');

    Route::post('updateSignedContractPdfStatus', 'PolizzaCarController@updateSignedContractPdfStatus');
    Route::post('updatePaymentProofPdfStatus', 'PolizzaCarController@updatePaymentProofPdfStatus');

    Route::post('polizzacar/mass_update', ['as'=>'polizzacar.mass_update','uses'=> 'PolizzaCarController@massUpdate']);

    Route::get('polizzacar/showPdf/{pdf}', 'PolizzaCarController@showPdfFile')->name('polizzacar.showPDF');

    Route::get('polizzacar/docusign/{id}', 'PolizzaCarController@signatureDocusign')->name('polizzacar.docusign');

    Route::get('polizzacar/docusign/feedback/{id}', array('as' => 'docusign.feedback','uses' => 'PolizzaCarController@getDocusignFeefback'));


});
