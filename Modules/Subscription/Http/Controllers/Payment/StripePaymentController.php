<?php


namespace Modules\Subscription\Http\Controllers\Payment;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Subscription\Http\Controllers\SubscriptionBaseController;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class StripePaymentController extends SubscriptionBaseController
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

            Stripe::setApiKey(config('vaance.stripe_secret_key'));


            $customer = Customer::create(array(
                'email' => Auth::user()->email,
                'source' => $request->get('stripeToken')
            ));

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $plan->full_price_cents,
                'currency' => $plan->currency->code
            ]);


            $success = $this->subscriptionService->processPayment([
                'plan' => $plan,
                'company' => $company,
                'user' => Auth::user(),
                'provider_name' => 'Stripe',
                'provider_id' => $charge->id,
                'provider_status' => $charge->status,
            ]);

            if($success){
                flash(trans('subscription::subscription.payments.payment_success'))->success();

                return redirect(route('subscription.invoices.get'));
            }

        } catch (\Exception $ex) {
            flash($ex->getMessage())->error();

            return redirect(route('subscription.subscribe'));
        }

    }

}
