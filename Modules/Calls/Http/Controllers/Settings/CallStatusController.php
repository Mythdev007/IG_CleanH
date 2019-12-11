<?php

namespace Modules\Calls\Http\Controllers\Settings;

use Modules\Calls\Datatables\Settings\CallStatusDatatable;
use Modules\Calls\Entities\CallStatus;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;

class CallStatusController extends ModuleCrudController
{

    protected $datatable = CallStatusDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = CallStatus::class;

    protected $disableWidgets = true;

    protected $moduleDictionary = true;


    protected $moduleName = 'calls';

    protected $permissions = [
        'browse' => 'calls.settings',
        'create' => 'calls.settings',
        'update' => 'calls.settings',
        'destroy' => 'calls.settings'
    ];

    protected $settingsBackRoute = 'calls.calls.index';

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text', 'col-class' => 'col-lg-12'],
        ]
    ];

    protected $languageFile = 'calls::calls.status';

    protected $routes = [
        'index' => 'calls.status.index',
        'create' => 'calls.status.create',
        'show' => 'calls.status.show',
        'edit' => 'calls.status.edit',
        'store' => 'calls.status.store',
        'destroy' => 'calls.status.destroy',
        'update' => 'calls.status.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
