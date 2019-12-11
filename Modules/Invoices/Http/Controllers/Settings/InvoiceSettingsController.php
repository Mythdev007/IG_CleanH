<?php


namespace Modules\Invoices\Http\Controllers\Settings;


use Modules\Invoices\Http\Forms\InvoiceSettingsForm;
use Modules\Platform\Core\Http\Controllers\ModuleSettingsController;

class InvoiceSettingsController extends ModuleSettingsController
{

    protected $moduleName = 'invoices';

    protected $languageFile = 'invoices::invoices.invoices_settings';

    protected $formClass = InvoiceSettingsForm::class;

    protected $settingsBackRoute = 'invoices.invoices.index';

    protected $fieldsName = [
        's_invoice_prefix','s_invoice_increment','s_invoice_due_days','s_invoice_use_increment'
    ];

    protected $showFields = [
        'general_settings' => [

            's_invoice_prefix' => [
                'type' => 'text',
                'col-class' => 'col-lg-3 col-md-3 col-sm-6'
            ],
            's_invoice_increment' => [
                'type' => 'text',
                'col-class' => 'col-lg-3 col-md-3 col-sm-6',
            ],
            's_invoice_due_days' => [
                'type' => 'text',
                'col-class' => 'col-lg-3 col-md-3 col-sm-6',
            ],
            's_invoice_use_increment' => ['type' => 'checkbox', 'col-class' => 'col-lg-3 col-md-3 col-sm-6'],
        ],

    ];

    protected $routes = [
        'show' => 'invoices.settings.show',
        'save' => 'invoices.settings.update',
    ];
}
