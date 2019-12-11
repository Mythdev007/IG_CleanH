<?php

namespace Modules\PolizzaCar\Http\Controllers\Settings;

use Modules\PolizzaCar\Datatables\Settings\PolizzaCarCategoryDatatable;
use Modules\PolizzaCar\Entities\PolizzaCarCategory;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;

class CategoryController extends ModuleCrudController
{
    protected $datatable = PolizzaCarCategoryDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = PolizzaCarCategory::class;

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

    protected $languageFile = 'PolizzaCar::PolizzaCar.category';

    protected $routes = [
        'index' => 'polizzacar.category.index',
        'create' => 'polizzacar.category.create',
        'show' => 'polizzacar.category.show',
        'edit' => 'polizzacar.category.edit',
        'store' => 'polizzacar.category.store',
        'destroy' => 'polizzacar.category.destroy',
        'update' => 'polizzacar.category.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
