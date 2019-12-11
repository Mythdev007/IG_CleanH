<?php

namespace Modules\Invoices\Http\Controllers\Settings;

use Modules\Invoices\Datatables\Settings\InvoiceStatusDatatable;
use Modules\Invoices\Datatables\Settings\RecurringPeriodDatatable;
use Modules\Invoices\Entities\InvoiceRecurringPeriod;
use Modules\Invoices\Entities\InvoiceStatus;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Forms\NameSystemNameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;

class RecurringPeriodController extends ModuleCrudController
{
    protected $datatable = RecurringPeriodDatatable::class;
    protected $formClass = NameSystemNameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = InvoiceRecurringPeriod::class;

    protected $disableWidgets = true;

    protected $moduleDictionary = true;


    protected $moduleName = 'invoices';

    protected $permissions = [
        'browse' => 'invoices.settings',
        'create' => 'invoices.settings',
        'update' => 'invoices.settings',
        'destroy' => 'invoices.settings'
    ];


    protected $settingsBackRoute = 'invoices.invoices.index';

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text', 'col-class' => 'col-lg-12'],
            'system_name' => ['type' => 'text', 'col-class' => 'col-lg-12'],
        ]
    ];

    protected $languageFile = 'invoices::invoices.recurring_period';

    protected $routes = [
        'index' => 'invoices.recurring-period.index',
        'create' => 'invoices.recurring-period.create',
        'show' => 'invoices.recurring-period.show',
        'edit' => 'invoices.recurring-period.edit',
        'store' => 'invoices.recurring-period.store',
        'destroy' => 'invoices.recurring-period.destroy',
        'update' => 'invoices.recurring-period.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
