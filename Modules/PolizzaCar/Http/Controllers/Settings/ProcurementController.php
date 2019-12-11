<?php

namespace Modules\PolizzaCar\Http\Controllers\Settings;

use Modules\PolizzaCar\Datatables\Settings\PolizzaCarProcurementDatatable;
use Modules\PolizzaCar\Entities\PolizzaCarProcurement;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\PolizzaCar\Http\Forms\PolizzaCarProcurementForm;
use Modules\PolizzaCar\Service\PolizzaCarService;
use Modules\PolizzaCar\Http\Requests\PolizzaCarProcurementRequest;
use Illuminate\Http\Request;

class ProcurementController extends ModuleCrudController
{
    protected $datatable = PolizzaCarProcurementDatatable::class;
    protected $formClass = PolizzaCarProcurementForm::class;
    protected $storeRequest = PolizzaCarProcurementRequest::class;
    protected $updateRequest = PolizzaCarProcurementRequest::class;
    protected $entityClass = PolizzaCarProcurement::class;

    protected $moduleDictionary = true;

    protected $showMassActionButtons = true;

    protected $disableWidgets = true;


    protected $moduleName = 'polizzacar';

    protected $permissions = [
        'browse' => 'procurement.browse',
        'create' => 'procurement.create',
        'update' => 'procurement.update',
        'destroy' => 'procurement.destroy'
    ];

    protected $settingsBackRoute = 'polizzacar.polizzacar.index';
    
    protected $showFields = [
        'contractor' => [
            'company_name' => [
                'type' => 'text',
                'col-class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-6'
            ],
            'company_vat' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'company_email' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],

            'company_phone' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'company_address' => [
                'type' => 'text',
                'col-class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-6 clear-left'
            ],

            'company_city' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],

            'company_cap' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],

            'company_provincia' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'country_id' => [
                'type' => 'manyToOne',
                'relation' => 'country',
                'column' => 'name',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
        ],
        'procurement' => [
            'subject_procurement' => [
                'type' => 'text',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6 col-xs-6'
            ],
            'works_type_details' => [
                'type' => 'manyToOne',
                'relation' => 'works_type',
                'column' => 'name',
                'col-class' => 'col-lg-6 col-md-6 col-sm-4 col-xs-6'
                ],
                'works_place_city' => [
                    'type' => 'text',
                    'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
                ],
                'works_place_pr' => [
                    'type' => 'text',
                    'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
                ],
                'works_duration_mm' => [
                    'type' => 'text',
                    'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
                ],    
            'procurement_total' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
            ],
        ],

    ];


    protected $languageFile = 'PolizzaCar::PolizzaCar.procurement';

    protected $routes = [
        'index' => 'polizzacar.procurement.index',
        'create' => 'polizzacar.procurement.create',
        'show' => 'polizzacar.procurement.show',
        'edit' => 'polizzacar.procurement.edit',
        'store' => 'polizzacar.procurement.store',
        'destroy' => 'polizzacar.procurement.destroy',
        'update' => 'polizzacar.procurement.update',
        'import' => 'polizzacar.procurement.import',
        'import_process' => 'polizzacar.procurement.import.process'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    protected function setupActionButtons()
    {
        $this->actionButtons[] = array(
            'href' => route($this->routes['create'], ['copy' => $this->entity->id]),
            'attr' => [

            ],
            'label' => trans('core::core.btn.copy')
        );
            
    }

    protected function setupCustomButtons()
    {
        $this->customShowButtons[] = array(
            'href' => route('polizzacar.procurement.convert.to.request', ['id' => $this->entity->id]),
            'attr' => [
            'class' => 'btn btn-crud bg-pink waves-effect pull-right',
            ],
            'label' => trans('PolizzaCar::PolizzaCar.request_insurance')
        );
          
    }


    public function convertToRequest($procurementId)
    {

        if ($this->permissions['create'] != '' && !\Auth::user()->hasPermissionTo($this->permissions['create'])) {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }

        $procurementService = \App::make(PolizzaCarService::class);

        $procurement = $procurementService->convertToRequest($procurementId);

        if (!empty($procurement)) {
            flash(trans('core::core.record_converted'))->success();

            return redirect()->route('polizzacar.polizzacar.edit', $procurement->id);
        }

        flash(trans('core::core.error_while_converting'))->error();
        return redirect()->route($this->routes['index']);

    }
}