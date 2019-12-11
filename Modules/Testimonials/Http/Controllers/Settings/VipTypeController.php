<?php

namespace Modules\Testimonials\Http\Controllers\Settings;

use Modules\Platform\Core\Datatable\DictionaryDatatable;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;
use Modules\Testimonials\Entities\TestimonialVipType;

class VipTypeController extends ModuleCrudController
{
    protected $datatable = DictionaryDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = TestimonialVipType::class;

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

    protected $languageFile = 'testimonials::testimonials.vip_type';

    protected $routes = [
        'index' => 'testimonials.vip_type.index',
        'create' => 'testimonials.vip_type.create',
        'show' => 'testimonials.vip_type.show',
        'edit' => 'testimonials.vip_type.edit',
        'store' => 'testimonials.vip_type.store',
        'destroy' => 'testimonials.vip_type.destroy',
        'update' => 'testimonials.vip_type.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
