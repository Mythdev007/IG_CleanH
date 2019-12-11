<?php

namespace Modules\Testimonials\Http\Controllers\Settings;

use Modules\Platform\Core\Datatable\DictionaryDatatable;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;
use Modules\Testimonials\Entities\TestimonialProductGroup;
use Modules\Testimonials\Entities\TestimonialStatusType;

class StatusTypeController extends ModuleCrudController
{
    protected $datatable = DictionaryDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = TestimonialStatusType::class;

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

    protected $languageFile = 'testimonials::testimonials.status_type';

    protected $routes = [
        'index' => 'testimonials.status_type.index',
        'create' => 'testimonials.status_type.create',
        'show' => 'testimonials.status_type.show',
        'edit' => 'testimonials.status_type.edit',
        'store' => 'testimonials.status_type.store',
        'destroy' => 'testimonials.status_type.destroy',
        'update' => 'testimonials.status_type.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
