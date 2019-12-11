<?php


namespace Modules\Subscription\Http\Controllers;



use Krucas\Settings\Facades\Settings;
use Modules\Platform\Core\Helper\SettingsHelper;

class SubscribeController extends SubscriptionBaseController
{

    public function subscribe()
    {

        $view = view('subscription::subscribe');

        $this->setupData($view);

        $view->with('enabled_paypal',Settings::get('s_subscription_paypal',false));
        $view->with('enabled_stripe',Settings::get('s_subscription_stripe',false));
        $view->with('enabled_cash',Settings::get('s_subscription_cash',false));

        return $view;
    }

    public function post(){

        dd(request()->all());

    }


}
