<?php

namespace Modules\Platform\Companies\Http\Controllers;

use Kris\LaravelFormBuilder\FormBuilderTrait;
use Krucas\Settings\Facades\Settings;
use Modules\Platform\Companies\Http\Forms\SubscriptionSettingsForm;
use Modules\Platform\Companies\Http\Requests\SaveSubscriptionSettingsRequest;
use Modules\Platform\Core\Helper\SettingsHelper;
use Modules\Platform\Core\Http\Controllers\AppBaseController;
use Modules\Platform\Core\Http\Controllers\ModuleSettingsController;

/**
 * Update Subscription settings
 *
 * Class SubscriptionSettingsController
 * @package Modules\Platform\Companies\Http\Controllers
 */
class SubscriptionSettingsController extends ModuleSettingsController
{

    protected $moduleName = 'companies';

    protected $settingsMode = true;

    protected $globalMode = true;

    protected $languageFile = 'companies::subscription_settings';

    protected $formClass = SubscriptionSettingsForm::class;

    protected $fieldsName = [
        's_subscription_invoice_from','s_subscription_terms_and_cond','s_subscription_notes','s_subscription_paypal','s_subscription_stripe','s_subscription_cash'
    ];

    protected $showFields = [

        'payments' => [
            's_subscription_paypal' => ['type' => 'checkbox', 'col-class' => 'col-lg-4'],
            's_subscription_stripe' => ['type' => 'checkbox', 'col-class' => 'col-lg-4'],
            's_subscription_cash' => ['type' => 'checkbox', 'col-class' => 'col-lg-4'],
        ],

        'invoice_settings' => [
            's_subscription_invoice_from' => ['type' => 'text', 'col-class' => 'col-lg-12 col-md-12 col-sm-12'],
            's_subscription_terms_and_cond' => ['type' => 'text', 'col-class' => 'col-lg-12 col-md-12 col-sm-12'],
            's_subscription_notes' => ['type' => 'text', 'col-class' => 'col-lg-12 col-md-12 col-sm-12'],
        ],

    ];

    protected $routes = [
        'show' => 'settings.subscription_settings',
        'save' => 'settings.subscription_settings',
    ];


    public function __construct()
    {
        parent::__construct();
    }

}
