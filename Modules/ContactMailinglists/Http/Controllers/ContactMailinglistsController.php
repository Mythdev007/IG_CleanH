<?php

namespace Modules\ContactMailinglists\Http\Controllers;

use Illuminate\Http\Request;
use Modules\ContactMailinglists\Datatables\ContactMailinglistsDatatable;
use Modules\ContactMailinglists\Entities\ContactMailinglist;
use Modules\ContactMailinglists\Http\Forms\ContactMailinglistForm;
use Modules\ContactMailinglists\Http\Requests\ContactMailinglistRequest;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;

class ContactMailinglistsController extends ModuleCrudController
{

    protected $datatable = ContactMailinglistsDatatable::class;
    protected $formClass = ContactMailinglistForm::class;
    protected $storeRequest = ContactMailinglistRequest::class;
    protected $updateRequest = ContactMailinglistRequest::class;
    protected $entityClass = ContactMailinglist::class;

    protected $moduleName = 'contactmailinglists';

    protected $permissions = [
        'browse' => 'contacts.browse',
        'create' => 'contacts.create',
        'update' => 'contacts.update',
        'destroy' => 'contacts.destroy'
    ];


    protected $showFields = [

        'information' => [
            'mailinglist_id' => [
                'type' => 'mailinglist_id',
                'col-class' => 'col-lg-12 col-sm-12 col-md-12'
            ],

            'subscribe_ip' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-sm-12 col-md-12'
            ],

            'subscribe_email_id' => [
                'type' => 'subscribe_email_id',
                'col-class' => 'col-lg-12 col-sm-12 col-md-12'
            ],

            'subscribe_date' => [
                'type' => 'date',
                'col-class' => 'col-lg-12 col-sm-12 col-md-12'
            ],

            'unsubscribe_date' => [
                'type' => 'date',
                'col-class' => 'col-lg-12 col-sm-12 col-md-12'
            ],
            'notes' => [
                'type' => 'notes',
                'col-class' => 'col-lg-12 col-sm-12 col-md-12'
            ],
         ]

    ];

    protected $languageFile = 'contactmailinglists::contactmailinglists';

    protected $routes = [
        'index' => 'contactmailinglists.contactmailinglists.index',
        'create' => 'contactmailinglists.contactmailinglists.create',
        'show' => 'contactmailinglists.contactmailinglists.show',
        'edit' => 'contactmailinglists.contactmailinglists.edit',
        'store' => 'contactmailinglists.contactmailinglists.store',
        'destroy' => 'contactmailinglists.contactmailinglists.destroy',
        'update' => 'contactmailinglists.contactmailinglists.update'
    ];

    public function __construct()
    {
        parent::__construct();

    }

}
