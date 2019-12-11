<?php

namespace Modules\Platform\Companies\Http\Controllers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Modules\Platform\Companies\Datatables\CompaniesDatatable;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Companies\Http\Forms\CompanyForm;
use Modules\Platform\Companies\Http\Requests\CompanyRequest;
use Modules\Platform\Companies\Repositories\CompanyRepository;
use Modules\Platform\Companies\Service\PlanService;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;

class CompanyController extends ModuleCrudController
{

    private $planService;

    public function __construct(PlanService $planService)
    {
        parent::__construct();
        $this->planService = $planService;
    }

    protected $settingsMode = true;

    protected $disableTabs = true;

    protected $moduleName = 'settings';

    protected $allowForceDelete = true;

    protected $permissions = [
        'browse' => 'settings.access',
        'create' => 'settings.access',
        'update' => 'settings.access',
        'destroy' => 'settings.access'
    ];

    protected $settingsPermission = 'settings.access';

    protected $entityClass = Company::class;

    protected $datatable = CompaniesDatatable::class;

    protected $formClass = CompanyForm::class;

    protected $storeRequest = CompanyRequest::class;

    protected $updateRequest = CompanyRequest::class;

    protected $repository = CompanyRepository::class;

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text'],
            'user_limit' => ['type' => 'number'],
            'storage_limit' => ['type' => 'number'],
            'subscription_valid_until' => ['type' => 'text',],
            'plan_id' => ['type' => 'manyToOne', 'relation' => 'plan', 'column' => 'name', 'col-class' => 'col-lg-6 col-sm-6 col-md-6 col-xs-6'],
            'is_enabled' => ['type' => 'checkbox'],
            'description' => ['type' => 'text', 'col-class' => 'col-lg-12 col-md-12 col-sm-12'],
        ]
    ];

    public function afterStore($request, &$entity)
    {
        if (!empty($entity->plan)) {
            $this->planService->syncPermissions($entity->plan);
        }
    }

    public function afterUpdate($request, &$entity)
    {
        if (!empty($entity->plan)) {
            $this->planService->syncPermissions($entity->plan);
        }
    }


    public function beforeDestroy($request, &$entity)
    {

        if($entity->id == Auth::user()->companyContext()->id){
            flash(trans('core::core.you_dont_have_access'))->error();

            $response = redirect()->route($this->routes['index']);
            respondWith($response);
        }


    }

    protected $languageFile = 'companies::companies';


    protected $routes = [
        'index' => 'settings.companies.index',
        'create' => 'settings.companies.create',
        'show' => 'settings.companies.show',
        'edit' => 'settings.companies.edit',
        'store' => 'settings.companies.store',
        'destroy' => 'settings.companies.destroy',
        'update' => 'settings.companies.update'
    ];
}
