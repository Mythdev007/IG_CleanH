<?php

namespace Modules\Tickets\Http\Controllers;

use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Tickets\Datatables\Tabs\TicketsTicketsDatatable;
use Modules\Tickets\Datatables\TicketDatatable;
use Modules\Tickets\Entities\Ticket;
use Modules\Tickets\Http\Forms\TicketForm;
use Modules\Tickets\Http\Requests\TicketsRequest;

class TicketsController extends ModuleCrudController
{
    protected $datatable = TicketDatatable::class;
    protected $formClass = TicketForm::class;
    protected $storeRequest = TicketsRequest::class;
    protected $updateRequest = TicketsRequest::class;
    protected $entityClass = Ticket::class;

    protected $moduleName = 'tickets';

    protected $showMassActionButtons = true;


    protected $permissions = [
        'browse' => 'tickets.browse',
        'create' => 'tickets.create',
        'update' => 'tickets.update',
        'destroy' => 'tickets.destroy'
    ];

    protected $moduleSettingsLinks = [

        ['route' => 'tickets.priority.index', 'label' => 'settings.priority'],
        ['route' => 'tickets.status.index', 'label' => 'settings.status'],
        ['route' => 'tickets.severity.index', 'label' => 'settings.severity'],
        ['route' => 'tickets.category.index', 'label' => 'settings.category'],


    ];

    protected $settingsPermission = 'tickets.settings';

    protected $showFields = [

        'information' => [

            'name' => [
                'type' => 'text',
            ],


            'due_date' => [
                'type' => 'date',
            ],


            'owned_by' => [
                'type' => 'assigned_to',
            ],

            'ticket_owner_id' => [
                'type' => 'manyToOne',
                'relation' => 'ticketOwner',
                'column' => 'name'
            ],

            'ticket_priority_id' => [
                'type' => 'manyToOne',
                'relation' => 'ticketPriority',
                'column' => 'name'
            ],


            'ticket_status_id' => [
                'type' => 'manyToOne',
                'relation' => 'ticketStatus',
                'column' => 'name'
            ],


            'ticket_severity_id' => [
                'type' => 'manyToOne',
                'relation' => 'ticketSeverity',
                'column' => 'name',
            ],


            'ticket_category_id' => [
                'type' => 'manyToOne',
                'relation' => 'ticketCategory',
                'column' => 'name'
            ],

            'contact_id' => [
                'type' => 'manyToOne',
                'relation' => 'contact',
                'column' => 'full_name',
                'dont_translate' => true
            ],

            'account_id' => [
                'type' => 'manyToOne',
                'relation' => 'account',
                'column' => 'name',
                'dont_translate' => true
            ],

            'parent_id' => [
                'type' => 'manyToOne',
                'relation' => 'parent',
                'column' => 'name',
                'dont_translate' => true
            ],

        ],


        'description' => [

            'description' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],

        ],


        'resolution' => [

            'resolution' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],

        ],


        'notes' => [

            'notes' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],

        ],


    ];

    protected $relationTabs = [


        'tickets' => [
            'icon' => 'report_problem',
            'permissions' => [
                'browse' => 'tickets.browse',
                'update' => 'tickets.update',
                'create' => 'tickets.create'
            ],
            'datatable' => [
                'datatable' => TicketsTicketsDatatable::class
            ],
            'route' => [
                'linked' => 'tickets.tickets.linked',
                'create' => 'tickets.tickets.create',
                'select' => 'tickets.tickets.selection',
                'bind_selected' => 'tickets.tickets.link'
            ],
            'create' => [
                'allow' => true,
                'modal_title' => 'tickets::tickets.create_new',
                'post_create_bind' => [
                    'relationType' => 'oneToMany',
                    'relatedField' => 'parent_id',

                ]
            ],

            'select' => [
                'allow' => false,
                'modal_title' => 'tickets::tickets.module'
            ],
        ],
    ];


    protected $languageFile = 'tickets::tickets';

    protected $routes = [
        'index' => 'tickets.tickets.index',
        'create' => 'tickets.tickets.create',
        'show' => 'tickets.tickets.show',
        'edit' => 'tickets.tickets.edit',
        'store' => 'tickets.tickets.store',
        'destroy' => 'tickets.tickets.destroy',
        'update' => 'tickets.tickets.update'
    ];


    public function __construct()
    {
        parent::__construct();
    }


    protected function setupIndexTabButtons()
    {
        $this->indexTabButtons[] = array(
            'href' => '#all',
            'default' => true,
            'attr' => [
                'class' => 'waves-effect waves-block',
                'role' => 'tab',
                'data-toggle' => "tab",
                'onClick' => "VAANCE_Datatable.headerFilterReset('dataTableBuilder')"
            ],
            'label' => trans('core::core.header_all')
        );
        $this->indexTabButtons[] = array(
            'href' => '#assigned',
            'attr' => [
                'class' => ' waves-effect waves-block',
                'role' => 'tab',
                'data-toggle' => "tab",
                'onClick' => "VAANCE_Datatable.headerFilterSet('assigned_to','dataTableBuilder',window.CURRENT_USER.name)"
            ],
            'label' => trans('core::core.header_assigned')
        );
    }

    public function setupCustomButtons()
    {
        $this->customShowButtons[] = array(
            'href' => route('tickets.tickets.print', $this->entity->id),
            'attr' => [
                'class' => 'btn bg-pink waves-effect pull-right',
            ],
            'label' => trans('tickets::tickets.print')
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

        $this->entity = $entity;

        if (empty($entity)) {
            flash(trans('core::core.entity.entity_not_found'))->error();

            return redirect(route($this->routes['index']));
        }

        if ($this->blockEntityOwnableAccess()) {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }

        $this->entityIdentifier = $entity->id;

        $this->entity = $entity;

        $printData = [
            'entity' => $this->entity
        ];

        $pdf = \PDF::loadView('tickets::pdf.print', $printData);

        return $pdf->inline($entity->name . '_TICKET.pdf');
    }
}
