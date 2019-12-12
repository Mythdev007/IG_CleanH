<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Charts\IncomeVsExpense;
use App\Charts\LeadOverview;
use App\Charts\TicketOverview;
use HipsterJazzbo\Landlord\Facades\Landlord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Calendar\Service\CalendarService;
use Modules\Contacts\Entities\Contact;
use Modules\Contacts\Service\ContactService;
use Modules\Dashboard\Datatables\TicketDatatable;
use Modules\Dashboard\Datatables\PolizzaCarDatatable;
use Modules\PolizzaCar\Http\Forms\PolizzaCarForm;
use Modules\Invoices\Entities\Invoice;
use Modules\Invoices\Service\InvoiceService;
use Modules\Leads\Entities\Lead;
use Modules\Leads\Service\LeadService;
use Modules\Orders\Entities\Order;
use Modules\Orders\Service\OrderService;
use Modules\Payments\Service\PaymentService;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Settings\Entities\Currency;
use Modules\Tickets\Datatables\Scope\TicketStatusScope;
use Modules\Tickets\Entities\Ticket;
use Modules\Tickets\Service\TicketService;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class DashboardController
 * @package Modules\Dashboard\Http\Controllers
 */
class DashboardController extends ModuleCrudController
{

    protected $languageFile = 'PolizzaCar::PolizzaCar';
    protected $repository = GenericRepository::class;
    protected $entityClass = PolizzaCar::class;
    protected $datatable = PolizzaCarDatatable::class;
    protected $formClass = PolizzaCarForm::class;
    protected $storeRequest = PolizzaCarRequest::class;
    protected $updateRequest = PolizzaCarRequest::class;

    /**
     * Dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Reset cached roles and permissions
        $view = view('dashboard::index');

        $leadService = \App::make(LeadService::class);
        $contactService = \App::make(ContactService::class);
        $orderService = \App::make(OrderService::class);
        $invoiceService = \App::make(InvoiceService::class);
        $paymentsService = \App::make(PaymentService::class);
        $ticketService   = \App::make(TicketService::class);

        $countLeads = $leadService->countByStatus(Lead::STATUS_NEW);
        $countContacts = $contactService->countByStatus(Contact::STATUS_NEW);
        $countOrders = $orderService->countByStatus(Order::STATUS_CREATED);
        $countInvoices = $invoiceService->countByStatus(Invoice::STATUS_CREATED);

        $currentCurrency = $request->get('ivseCurrency',config('dashboard.income_vs_expense_default'));

        $view->with('countContacts', $countContacts);
        $view->with('countLeads', $countLeads);
        $view->with('countOrders', $countOrders);
        $view->with('countInvoices', $countInvoices);
        $view->with('paymentCurrency',Currency::all()->pluck('code','code'));

        $currency = Currency::whereCode($currentCurrency)->first();

        if($currency){
            $currentCurrency = $currency->code;
        }else{
            $currentCurrency = config('dashboard.income_vs_expense_default');
        }

        $view->with('currentCurrency',$currentCurrency);

        $polizzaCarDatatable = new PolizzaCarDatatable();
        $polizzaCarDatatable->setTableId('PolizzaCarDatatable');
        $polizzaCarDatatable->setAjaxSource(route('dashboard.polizzacar'));

        $view->with('polizzaCarDatatable', $polizzaCarDatatable->html());

        $ticketDatatable = new TicketDatatable();
        $ticketDatatable->setTableId('TicketDatatable');
        $ticketDatatable->setAjaxSource(route('dashboard.new-tickets'));

        $view->with('leadOverview',new LeadOverview($leadService->groupByStatus()));
        $view->with('ticketStatusOverview', new TicketOverview($ticketService->groupByStatus()));
        $view->with('ticketPriorityOverview', new TicketOverview($ticketService->groupByPriority(),'#FF9800'));
        $view->with('incomeVsExpense',new IncomeVsExpense($paymentsService->incomeVsExpense($currentCurrency)));

        $view->with('ticketDatatable', $ticketDatatable->html());    

        /**  this part is for fast quote*/
        $view->with('show_fields', $this->showFields);

        $createForm = $this->form($this->formClass, [
            'method' => 'POST',
           // 'url' => $url,
            'id' => 'module_form',
            //'model' => $fillModel
        ]);

        $formId = uniqid('form_');

        $view->with('modal_form', true);
        $createForm->setFormOption('id', $formId);
        if ($this->formModalCssClass != null) {
            $createForm->setFormOption('class', $this->formModalCssClass);
        } else {
            $createForm->setFormOption('class', 'module_form related-modal-form');
        }
        if ($this->formModalCssId != null) {
            $createForm->setFormOption('id', $this->formModalCssId);
        }

        $view->with('formId', $formId);
        $createForm->add('entityCreateMode', 'hidden', [
            'value' => 'modal'
        ]);
        $createForm->add('relationType', 'hidden', [
            'value' => ''
        ]);
        $createForm->add('relatedField', 'hidden', [
            'value' => ''
        ]);
        $createForm->add('relatedEntityId', 'hidden', [
            'value' => ''
        ]);

        $createForm->add('relatedEntity', 'hidden', [
            'value' => ''
        ]);

        $createForm->add('mass_action_ids', 'hidden', [
            'value' => '',
        ]);
        $createForm->setFormOption('class', "module_form related-modal-form mass_update_form");           

        $view->with('form', $createForm);
/////////////////////////////////////////////////////

        return $view;
    }

    /**
     * @param TicketDatatable $ticketDatatable
     * @return mixed
     */
    public function getNewTickets(TicketDatatable $ticketDatatable)
    {
        $ticketDatatable->addScope(new TicketStatusScope(Ticket::STATUS_NEW));

        return $ticketDatatable->render('core::crud.module.modal-datatable');
    }

    public function getPolizzacar(PolizzaCarDatatable $polizzaCarDatatable) {
        $polizzaCarDatatable = new PolizzaCarDatatable();
        return $polizzaCarDatatable->render('core::crud.module.modal-datatable');
    }

    protected $showFields = [
        'procurement' => [
            'works_duration_mm' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6 clear-left'
            ],    
            'risk_id' => [
                'type' => 'manyToOne',
                'relation' => 'tariffa',
                'column' => 'name',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
            ],
            'coeff_tariffa' => [
                'type' => 'decimal',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
            ],
            'tax_rate' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
            ], 
        ],
        'warranties' => [
            'sezione_a' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-md-12'
            ],
            'partita_1' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4 col-sm-12 col-xs-12'
            ],
            'car_p1_limit_amount' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p1_premium_gross' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p1_premium_net' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            
            'partita_2' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4 col-sm-12 col-xs-12'
            ],
            'car_p2_limit_amount' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p2_premium_gross' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p2_premium_net' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'partita_3' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4 col-sm-12 col-xs-12'
            ],
            'car_p3_limit_amount' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p3_premium_gross' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p3_premium_net' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'sezione_b' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4'
            ],
            'car_civil_liability' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'sezione_b_terms' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'total_labels' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4 col-sm-12 col-xs-12 clear-left'
            ],
            'partite_total' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'total_gross' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'total_net' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            
        ],

    ];
}
