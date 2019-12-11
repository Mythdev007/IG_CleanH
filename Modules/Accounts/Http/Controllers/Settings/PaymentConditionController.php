<?php

namespace Modules\Accounts\Http\Controllers\Settings;

use Modules\Accounts\Entities\AccountPaymentCondition;
use Modules\Platform\Core\Datatable\DictionaryDatatable;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Core\Http\Forms\NameDictionaryForm;
use Modules\Platform\Core\Http\Requests\NameDictionaryRequest;
use Modules\Testimonials\Entities\TestimonialProductGroup;

class PaymentConditionController extends ModuleCrudController
{
    protected $datatable = DictionaryDatatable::class;
    protected $formClass = NameDictionaryForm::class;
    protected $storeRequest = NameDictionaryRequest::class;
    protected $updateRequest = NameDictionaryRequest::class;
    protected $entityClass = AccountPaymentCondition::class;

    protected $disableWidgets = true;

    protected $moduleDictionary = true;

    protected $moduleName = 'accounts';

    protected $permissions = [
        'browse' => 'accounts.settings',
        'create' => 'accounts.settings',
        'update' => 'accounts.settings',
        'destroy' => 'accounts.settings'
    ];


    protected $settingsBackRoute = 'accounts.accounts.index';

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text', 'col-class' => 'col-lg-12'],
        ]
    ];

    protected $languageFile = 'accounts::accounts.payment_condition';

    protected $routes = [
        'index' => 'accounts.payment_condition.index',
        'create' => 'accounts.payment_condition.create',
        'show' => 'accounts.payment_condition.show',
        'edit' => 'accounts.payment_condition.edit',
        'store' => 'accounts.payment_condition.store',
        'destroy' => 'accounts.payment_condition.destroy',
        'update' => 'accounts.payment_condition.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
