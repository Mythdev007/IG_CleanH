<?php

namespace Modules\ContactWebsites\Http\Controllers;

use Illuminate\Http\Request;
use Modules\ContactWebsites\Datatables\ContactWebsiteDatatable;
use Modules\ContactWebsites\Entities\ContactWebsite;
use Modules\ContactWebsites\Http\Forms\ContactWebsiteForm;
use Modules\ContactWebsites\Http\Requests\ContactEmailsRequest;
use Modules\ContactWebsites\Http\Requests\CreateContactWebsitesRequest;
use Modules\ContactWebsites\Http\Requests\UpdateContactWebsitesRequest;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;

class ContactWebsitesController extends ModuleCrudController
{

    protected $datatable = ContactWebsiteDatatable::class;
    protected $formClass = ContactWebsiteForm::class;
    protected $storeRequest = CreateContactWebsitesRequest::class;
    protected $updateRequest = UpdateContactWebsitesRequest::class;
    protected $entityClass = ContactWebsite::class;

    protected $moduleName = 'contactemails';

    protected $permissions = [
        'browse' => 'contacts.browse',
        'create' => 'contacts.create',
        'update' => 'contacts.update',
        'destroy' => 'contacts.destroy'
    ];


    protected $showFields = [

        'information' => [

            'url' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-sm-12 col-md-12'
            ],

            'is_default' => [
                'type' => 'boolean',
                'col-class' => 'col-lg-2 col-sm-2 col-md-2'
            ],

            'is_active' => [
                'type' => 'boolean',
                'col-class' => 'col-lg-2 col-sm-2 col-md-2'
            ],

            'type_id' => [
                'type' => 'text',
                'col-class' => 'col-lg-8 col-sm-8 col-md-8'
            ],

        ],


        'notes' => [

            'notes' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-sm-12 col-md-12'
            ],

        ],


    ];

    protected $languageFile = 'contactwebsites::contactwebsites';

    protected $routes = [
        'index' => 'contactwebsites.contactwebsites.index',
        'create' => 'contactwebsites.contactwebsites.create',
        'show' => 'contactwebsites.contactwebsites.show',
        'edit' => 'contactwebsites.contactwebsites.edit',
        'store' => 'contactwebsites.contactwebsites.store',
        'destroy' => 'contactwebsites.contactwebsites.destroy',
        'update' => 'contactwebsites.contactwebsites.update'
    ];

    public function index(Request $request)
    {
        return redirect()->route('contacts.contacts.index');
    }

    public function __construct()
    {
        parent::__construct();

    }

}
