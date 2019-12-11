<?php

namespace Modules\Platform\Companies\Http\Controllers;

use Modules\Platform\Companies\Datatables\SubscriptionInvoiceDatatable;
use Modules\Platform\Companies\Http\Forms\SubscriptionInvoiceForm;
use Modules\Platform\Companies\Http\Requests\SubscriptionInvoiceRequest;
use Modules\Platform\Companies\Service\PlanService;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Subscription\Entities\SubscriptionInvoice;

class SubscriptionInvoiceController extends ModuleCrudController
{

    public function __construct(PlanService $planService)
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

    protected $settingsPermission = 'settings.access';

    protected $entityClass = SubscriptionInvoice::class;

    protected $datatable = SubscriptionInvoiceDatatable::class;

    protected $formClass = SubscriptionInvoiceForm::class;

    protected $storeRequest = SubscriptionInvoiceRequest::class;

    protected $updateRequest = SubscriptionInvoiceRequest::class;

    public function setupCustomButtons()
    {
        $this->customShowButtons[] = array(
            'href' => route('settings.subscription-invoice.print', $this->entity->id),
            'attr' => [
                'class' => 'btn bg-pink waves-effect pull-right',
            ],
            'label' => trans('core::core.print')
        );
    }

    /**
     * Invoice print
     *
     * @param $identifier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function print($identifier)
    {

        if ($this->permissions['browse'] != '' && !\Auth::user()->hasPermissionTo($this->permissions['browse'])) {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }

        $repository = $this->getRepository();

        $entity = $repository->find($identifier);

        if (\Auth::user()->canAccessCompany()) {

            if (!empty($entity)) {
                return $entity->download();
            }
        }

    }

    protected $showFields = [
        'details' => [
            'invoice_number' => ['type' => 'text'],
            'product_name' => ['type' => 'text'],
            'invoice_date' => ['type' => 'text'],

            'price' => ['type' => 'text'],
            'tax_rate' => ['type' => 'text'],
            'tax_description' => ['type' => 'text'],
            'currency_name' => ['type' => 'text'],
            'status' => ['type' => 'checkbox'],
            'company_id' => ['type' => 'manyToOne', 'relation' => 'company', 'column' => 'name', 'col-class' => 'col-lg-4', 'permission' => 'settings.access'],
        ],

        'bill_data' => [
            'invoice_from' => ['type' => 'text'],
            'invoice_to' => ['type' => 'text'],
        ],

        'payment' => [
            'plan_name' => ['type' => 'text'],
            'period' => ['type' => 'text'],
            'provider_name' => ['type' => 'text'],
            'provider_id' => ['type' => 'text'],
            'provider_status' => ['type' => 'text'],
        ],

        'notes' => [
            'terms_and_cond' => ['type' => 'text'],
            'notes' => ['type' => 'text'],
        ]
    ];

    public function afterStore($request, &$entity)
    {

    }

    public function afterUpdate($request, &$entity)
    {

    }

    protected $languageFile = 'companies::subscription_invoice';


    protected $routes = [
        'index' => 'settings.subscription-invoice.index',
        'create' => 'settings.subscription-invoice.create',
        'show' => 'settings.subscription-invoice.show',
        'edit' => 'settings.subscription-invoice.edit',
        'store' => 'settings.subscription-invoice.store',
        'destroy' => 'settings.subscription-invoice.destroy',
        'update' => 'settings.subscription-invoice.update'
    ];
}
