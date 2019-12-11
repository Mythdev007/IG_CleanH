<?php

namespace Modules\Platform\Companies\Http\Controllers;

use Modules\Platform\Companies\Datatables\CompanyPlansDatatable;
use Modules\Platform\Companies\Entities\CompanyPlan;
use Modules\Platform\Companies\Http\Forms\CompanyPlanForm;
use Modules\Platform\Companies\Http\Requests\CreateCompanyPlanRequest;
use Modules\Platform\Companies\Http\Requests\UpdateCompanyPlanRequest;
use Modules\Platform\Companies\Repositories\CompanyPlansRepository;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;

class CompanyPlansController extends ModuleCrudController
{
    public function __construct()
    {
        parent::__construct();

    }

    protected $settingsMode = true;

    protected $disableTabs = true;

    protected $demoMode = true;


    protected $moduleName = 'settings';

    protected function setupCustomButtons()
    {
        $this->customShowButtons[] = array(
            'href' => route('settings.company-plans.permissions', $this->entity->id),
            'attr' => [
                'class' => 'btn bg-pink waves-effect',
            ],
            'label' => trans('companies::companyPlans.permissions'),
        );
    }

    protected $permissions = [
        'browse' => 'settings.access',
        'create' => 'settings.access',
        'update' => 'settings.access',
        'destroy' => 'settings.access'
    ];

    protected $entityClass = CompanyPlan::class;

    protected $datatable = CompanyPlansDatatable::class;

    protected $formClass = CompanyPlanForm::class;

    protected $storeRequest = CreateCompanyPlanRequest::class;

    protected $updateRequest = UpdateCompanyPlanRequest::class;

    protected $repository = CompanyPlansRepository::class;

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text'],
            'api_name' => ['type' => 'text'],
            'is_free' => ['type' => 'checkbox', 'col-class' => 'col-lg-3'],
            'is_active' => ['type' => 'checkbox', 'col-class' => 'col-lg-3'],
            'featured' => ['type' => 'checkbox', 'col-class' => 'col-lg-3'],
            'price' => ['type' => 'text','col-class' => 'col-lg-4'],
            'period' => ['type' => 'text','col-class' => 'col-lg-4'],
            'tax_rate' => ['type' => 'text','col-class' => 'col-lg-4'],
            'tax_name' => ['type' => 'text','col-class' => 'col-lg-4'],
            'teams_limit' => ['type' => 'text'],
            'storage_limit' => ['type' => 'text'],
            'currency_id' => ['type' => 'manyToOne', 'relation' => 'currency', 'column' => 'code', 'dont_translate' => true],
            'orderby' => ['type' => 'text'],
            'color' => ['type' => 'text'],
            'features_list' =>  ['type' => 'text', 'col-class' => 'col-lg-12 col-md-12 col-sm-12'],
            'description' => ['type' => 'text', 'col-class' => 'col-lg-12 col-md-12 col-sm-12'],
        ],

    ];

    protected $languageFile = 'companies::companyPlans';

    protected $routes = [
        'index' => 'settings.company-plans.index',
        'create' => 'settings.company-plans.create',
        'show' => 'settings.company-plans.show',
        'edit' => 'settings.company-plans.edit',
        'store' => 'settings.company-plans.store',
        'destroy' => 'settings.company-plans.destroy',
        'update' => 'settings.company-plans.update'
    ];
}
