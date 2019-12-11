<?php

namespace Modules\Contacts\Http\Controllers\Settings;

use Modules\ContactMailinglists\Entities\MailinglistDict;
use Modules\Contacts\Datatables\Settings\ContactSourceDatatable;
use Modules\Contacts\Datatables\Settings\CustomerLanguageDatatable;
use Modules\Contacts\Datatables\Settings\MailingListDatatable;
use Modules\Contacts\Entities\ContactSource;
use Modules\Contacts\Entities\CustomerLanguage;
use Modules\Contacts\Http\Forms\LanguageForm;
use Modules\Contacts\Http\Forms\MailingListForm;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Forms\NameIconDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;

class MailingListController extends ModuleCrudController
{
    protected $datatable = MailingListDatatable::class;
    protected $formClass = MailingListForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = MailinglistDict::class;

    protected $disableWidgets = true;

    protected $moduleDictionary = true;


    protected $moduleName = 'contacts';

    protected $permissions = [
        'browse' => 'contacts.settings',
        'create' => 'contacts.settings',
        'update' => 'contacts.settings',
        'destroy' => 'contacts.settings'
    ];

    protected $settingsBackRoute = 'contacts.contacts.index';

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text', 'col-class' => 'col-lg-12'],
            'description' => ['type' => 'text', 'col-class' => 'col-lg-12'],
        ]
    ];

    protected $languageFile = 'contacts::contacts.mailinglist';

    protected $routes = [
        'index' => 'contacts.mailinglist.index',
        'create' => 'contacts.mailinglist.create',
        'show' => 'contacts.mailinglist.show',
        'edit' => 'contacts.mailinglist.edit',
        'store' => 'contacts.mailinglist.store',
        'destroy' => 'contacts.mailinglist.destroy',
        'update' => 'contacts.mailinglist.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
