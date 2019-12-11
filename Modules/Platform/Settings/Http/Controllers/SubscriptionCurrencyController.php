<?php

namespace Modules\Platform\Settings\Http\Controllers;

use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Platform\Settings\Datatables\SubscriptionCurrencyDatatable;
use Modules\Platform\Settings\Entities\SubscriptionCurrency;
use Modules\Platform\Settings\Http\Forms\SubscriptionCurrencyForm;
use Modules\Platform\Settings\Http\Requests\SubscriptionCurrencySettingsRequest;
use Modules\Platform\Settings\Repositories\SubscriptionCurrencyRepository;

class SubscriptionCurrencyController extends ModuleCrudController
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $settingsMode = true;

    protected $disableTabs = true;

    protected $demoMode = true;


    protected $moduleName = 'settings';

    protected $permissions = [
        'browse' => 'settings.access',
        'create' => 'settings.access',
        'update' => 'settings.access',
        'destroy' => 'settings.access'
    ];

    protected $entityClass = SubscriptionCurrency::class;

    protected $datatable = SubscriptionCurrencyDatatable::class;

    protected $formClass = SubscriptionCurrencyForm::class;

    protected $storeRequest = SubscriptionCurrencySettingsRequest::class;

    protected $updateRequest = SubscriptionCurrencySettingsRequest::class;

    protected $repository = SubscriptionCurrencyRepository::class;

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text'],
            'code' => ['type' => 'text'],
            'symbol' => ['type' => 'text'],
        ]
    ];


    protected $languageFile = 'settings::currency';


    protected $routes = [
        'index' => 'settings.subscription_currency.index',
        'create' => 'settings.subscription_currency.create',
        'show' => 'settings.subscription_currency.show',
        'edit' => 'settings.subscription_currency.edit',
        'store' => 'settings.subscription_currency.store',
        'destroy' => 'settings.subscription_currency.destroy',
        'update' => 'settings.subscription_currency.update'
    ];
}
