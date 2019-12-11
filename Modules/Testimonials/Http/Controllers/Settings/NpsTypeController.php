<?php

namespace Modules\Testimonials\Http\Controllers\Settings;

use Modules\Platform\Core\Datatable\DictionaryDatatable;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;
use Modules\Testimonials\Entities\TestimonialNpsType;

class NpsTypeController extends ModuleCrudController
{
    protected $datatable = DictionaryDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = TestimonialNpsType::class;

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

    protected $languageFile = 'testimonials::testimonials.nps_type';

    protected $routes = [
        'index' => 'testimonials.nps_type.index',
        'create' => 'testimonials.nps_type.create',
        'show' => 'testimonials.nps_type.show',
        'edit' => 'testimonials.nps_type.edit',
        'store' => 'testimonials.nps_type.store',
        'destroy' => 'testimonials.nps_type.destroy',
        'update' => 'testimonials.nps_type.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
