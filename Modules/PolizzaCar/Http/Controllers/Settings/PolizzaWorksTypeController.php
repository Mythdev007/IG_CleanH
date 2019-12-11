<?php

namespace Modules\PolizzaCar\Http\Controllers\Settings;

use Modules\PolizzaCar\Datatables\Settings\PolizzaCarWorksTypeDatatable;
use Modules\PolizzaCar\Entities\PolizzaCarWorksType;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;

class PolizzaWorksTypeController extends ModuleCrudController
{
    protected $datatable = PolizzaCarWorksTypeDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = PolizzaCarWorksType::class;

    protected $disableWidgets = true;

    protected $moduleDictionary = true;


    protected $moduleName = 'polizzacar';

    protected $permissions = [
        'browse' => 'polizzacar.browse',
        'create' => 'polizzacar.create',
        'update' => 'polizzacar.update',
        'destroy' => 'polizzacar.destroy'
    ];

    protected $settingsBackRoute = 'polizzacar.polizzacar.index';

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text', 'col-class' => 'col-lg-12'],
        ]
    ];

    protected $languageFile = 'PolizzaCar::PolizzaCar.works_type';

    protected $routes = [
        'index' => 'polizzacar.works_type.index',
        'create' => 'polizzacar.works_type.create',
        'show' => 'polizzacar.works_type.show',
        'edit' => 'polizzacar.works_type.edit',
        'store' => 'polizzacar.works_type.store',
        'destroy' => 'polizzacar.works_type.destroy',
        'update' => 'polizzacar.works_type.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
