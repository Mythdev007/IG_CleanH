<?php

namespace Modules\Platform\Settings\Http\Controllers;

use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Settings\Datatables\ProvinceDatatable;
use Modules\Platform\Settings\Datatables\LanguageDatatable;
use Modules\Platform\Settings\Entities\Province;
use Modules\Platform\Settings\Entities\Language;
use Modules\Platform\Settings\Http\Forms\ProvinceForm;
use Modules\Platform\Settings\Http\Forms\LanguageForm;
use Modules\Platform\Settings\Http\Requests\ProvinceSettingsRequest;
use Modules\Platform\Settings\Http\Requests\LanguageSettingsRequest;
use Modules\Platform\Settings\Repositories\ProvinceRepository;
use Modules\Platform\Settings\Repositories\LanguageRepository;

class ProvinceController extends ModuleCrudController
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $settingsMode = true;

    protected $disableTabs = true;

    protected $moduleName = 'settings';

    protected $permissions = [
        'browse' => 'settings.access',
        'create' => 'settings.access',
        'update' => 'settings.access',
        'destroy' => 'settings.access'
    ];

    protected $entityClass = Province::class;

    protected $datatable = ProvinceDatatable::class;

    protected $formClass = ProvinceForm::class;

    protected $storeRequest = ProvinceSettingsRequest::class;

    protected $updateRequest = ProvinceSettingsRequest::class;

    protected $repository = Province::class;

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text',  'col-class'=>'col-lg-6 col-sm-6'],
            'abbr_prov' => ['type' => 'text', 'col-class'=>'col-lg-4 col-lg-6'],
            'is_active' => ['type' => 'boolean', 'col-class'=>'col-lg-6 col-sm-6'],
        ]
    ];

    protected $languageFile = 'settings::province';

    protected $routes = [
        'index' => 'settings.province.index',
        'create' => 'settings.province.create',
        'show' => 'settings.province.show',
        'edit' => 'settings.province.edit',
        'store' => 'settings.province.store',
        'destroy' => 'settings.province.destroy',
        'update' => 'settings.province.update'
    ];
}
