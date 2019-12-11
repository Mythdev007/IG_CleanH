<?php

namespace Modules\Testimonials\Http\Controllers\Settings;

use Modules\Platform\Core\Datatable\DictionaryDatatable;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;
use Modules\Testimonials\Entities\TestimonialProductGroup;

class ProductGroupController extends ModuleCrudController
{
    protected $datatable = DictionaryDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = TestimonialProductGroup::class;

    protected $disableWidgets = true;

    protected $moduleDictionary = true;

    protected $moduleName = 'testimonials';

    protected $permissions = [
        'browse' => 'testimonials.settings',
        'create' => 'testimonials.settings',
        'update' => 'testimonials.settings',
        'destroy' => 'testimonials.settings'
    ];

    protected $settingsBackRoute = 'testimonials.testimonials.index';

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text', 'col-class' => 'col-lg-12'],
        ]
    ];

    protected $languageFile = 'testimonials::testimonials.product_group';

    protected $routes = [
        'index' => 'testimonials.product_group.index',
        'create' => 'testimonials.product_group.create',
        'show' => 'testimonials.product_group.show',
        'edit' => 'testimonials.product_group.edit',
        'store' => 'testimonials.product_group.store',
        'destroy' => 'testimonials.product_group.destroy',
        'update' => 'testimonials.product_group.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
