<?php

namespace Modules\Testimonials\Http\Controllers\Settings;

use Modules\Platform\Core\Datatable\DictionaryDatatable;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;
use Modules\Testimonials\Entities\TestimonialUsageType;

class UsageTypeController extends ModuleCrudController
{
    protected $datatable = DictionaryDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = TestimonialUsageType::class;

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

    protected $languageFile = 'testimonials::testimonials.usage_type';

    protected $routes = [
        'index' => 'testimonials.usage_type.index',
        'create' => 'testimonials.usage_type.create',
        'show' => 'testimonials.usage_type.show',
        'edit' => 'testimonials.usage_type.edit',
        'store' => 'testimonials.usage_type.store',
        'destroy' => 'testimonials.usage_type.destroy',
        'update' => 'testimonials.usage_type.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
