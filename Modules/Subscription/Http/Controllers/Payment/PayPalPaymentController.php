<?php


namespace Modules\Subscription\Http\Controllers\Payment;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Platform\Companies\Service\CompanyService;
use Modules\Subscription\Http\Controllers\SubscriptionBaseController;
use Modules\Subscription\Service\SubscriptionService;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalPaymentController extends SubscriptionBaseController
{

    protected $provider;

    public function __construct(SubscriptionService $service, CompanyService $companyService)
    {
        parent::__construct($service, $companyService);

        $this->provider = new ExpressCheckout();

    }

    /**
     * Process paypal payment
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

            $response = $this->provider->setExpressCheckout($this->paypalCart($plan));

            if (!$response['paypal_link']) {

                flash(trans('subscription::subscription.payments.paypal_error'))->error();

                return redirect(route('subscription.subscribe'));

            }

            return redirect($response['paypal_link']);

        } catch (\Exception $ex) {
            flash($ex->getMessage())->error();

            return redirect(route('subscription.subscribe'));
        }

    }

    /**
     * Prepare PayPal Cart
     * @param $plan
     * @return array
     */
    private function paypalCart($plan)
    {

        $prepInvoiceNumber = $this->subscriptionService->generateInvoiceNumber();

        return [
            'items' => [
                [
                    'name' => $plan->name,
                    'price' => $plan->full_price,
                    'qty' => 1,
                ],
            ],

            'return_url' => route('subscription.payment.paypal.status',[
                'plan_id' => $plan->id
            ]),
            // every invoice id must be unique, else you'll get an error from paypal
            'invoice_id' => $prepInvoiceNumber.'-'.uniqid(), // required for simplicity of payment processing
            'invoice_description' => "Invoice #" . $prepInvoiceNumber,
            'cancel_url' => route('subscription.subscribe'),

            'total' => $plan->full_price,
        ];
    }

    /**
     * Second part of paypal payment process
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkoutStatus(Request $request)
    {

        $token = $request->get('token');
        $payerId = $request->get('PayerID');

        $response = $this->provider->getExpressCheckoutDetails($token);


        if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            flash(trans('subscription::subscription.payments.paypal_error'))->error();

            return redirect(route('subscription.subscribe'));

        }

        $company = \Auth::user()->companyContext();

        $plan = $this->subscriptionService->getPlan($request->get('plan_id'));

        if (empty($plan)) {

            flash(trans('subscription::subscription.payments.invalid_plan'))->error();

            return redirect(route('subscription.subscribe'));
        }

        try {

            $this->validateBeforePurchase($plan);

            $payment_status = $this->provider->doExpressCheckoutPayment($this->paypalCart($plan), $token, $payerId);

            $success = $this->subscriptionService->processPayment([
                'plan' => $plan,
                'company' => $company,
                'user' => Auth::user(),
                'provider_name' => 'paypal',
                'provider_id' => $payment_status['PAYMENTINFO_0_TRANSACTIONID'],
                'provider_status' => $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'],
            ]);

            if ($success) {
                flash(trans('subscription::subscription.payments.payment_success'))->success();

                return redirect(route('subscription.invoices.get'));
            }

        } catch (\Exception $ex) {
            flash($ex->getMessage())->error();

            return redirect(route('subscription.subscribe'));
        }

    }

}
