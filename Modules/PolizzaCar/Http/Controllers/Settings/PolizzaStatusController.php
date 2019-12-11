<?php

namespace Modules\PolizzaCar\Http\Controllers\Settings;

use Modules\PolizzaCar\Datatables\Settings\PolizzaCarStatusDatatable;
use Modules\PolizzaCar\Entities\PolizzaCarStatus;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;

class PolizzaStatusController extends ModuleCrudController
{
    protected $datatable = PolizzaCarStatusDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = PolizzaCarStatus::class;

    protected $disableWidgets = true;

    protected $moduleDictionary = true;


    protected $moduleName = 'polizzacar';

    protected $permissions = [
        'browse' => 'polizzacar.settings',
        'create' => 'polizzacar.settings',
        'update' => 'polizzacar.settings',
        'destroy' => 'polizzacar.settings'
    ];

    protected $settingsBackRoute = 'polizzacar.polizzacar.index';

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text', 'col-class' => 'col-lg-12'],
            'image' => ['type' => 'text', 'col-class' => 'col-lg-12'],
            'color' => ['type' => 'text', 'col-class' => 'col-lg-12'],
        ]
    ];

    protected $languageFile = 'PolizzaCar::PolizzaCar.status';

    protected $routes = [
        'index' => 'polizzacar.status.index',
        'create' => 'polizzacar.status.create',
        'show' => 'polizzacar.status.show',
        'edit' => 'polizzacar.status.edit',
        'store' => 'polizzacar.status.store',
        'destroy' => 'polizzacar.status.destroy',
        'update' => 'polizzacar.status.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
