<?php


namespace Modules\Subscription\Http\Controllers\Payment;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Subscription\Http\Controllers\SubscriptionBaseController;

class CashPaymentController extends SubscriptionBaseController
{

    public function process(Request $request)
    {

        $company = \Auth::user()->companyContext();

        $plan = $this->subscriptionService->getPlan($request->get('plan_id'));

        if (empty($plan)) {

            flash(trans('subscription::subscription.payments.invalid_plan'))->error();

            return redirect(route('subscription.subscribe'));
        }

        try {

            $this->validateBeforePurchase($plan);

            $success = $this->subscriptionService->processPayment([
                'plan' => $plan,
                'company' => $company,
                'user' => Auth::user(),
                'provider_name' => 'cash',
                'provider_id' => '',
                'provider_status' => '',
            ]);

            if ($success) {
                flash(trans('subscription::subscription.payments.payment_processing'))->success();

                return redirect(route('subscription.invoices.get'));
            }

        } catch (\Exception $ex) {

            flash($ex->getMessage())->error();

            return redirect(route('subscription.subscribe'));
        }
    }

}
