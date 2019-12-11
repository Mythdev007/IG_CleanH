<?php


namespace Modules\Subscription\Service;


use Carbon\Carbon;
use Krucas\Settings\Facades\Settings;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Companies\Repositories\CompanyPlansRepository;
use Modules\Platform\Core\Helper\SettingsHelper;
use Modules\Subscription\Entities\SubscriptionInvoice;

class SubscriptionService
{

    private $plansRepo;

    public function __construct(CompanyPlansRepository $plansRepo)
    {
        $this->plansRepo = $plansRepo;
    }

    /**
     * Generate next invoice number
     *
     * @return int|string
     */
    public function generateInvoiceNumber()
    {
        $number = SubscriptionInvoice::count() + 1;
        $number = 'SUB-' . str_pad($number, 6, "0", STR_PAD_LEFT);


        return $number;
    }

    /**
     * Get active plans
     * @return mixed
     */
    public function activePlans()
    {
        return $this->plansRepo->activePlans();
    }

    /**
     * Get active plan except of selected plan
     * @param $currentPlanId
     * @return mixed
     */
    public function activePlansExceptCurrent($currentPlanId)
    {
        return $this->plansRepo->activePlansExceptCurrent($currentPlanId);
    }

    /**
     * Get plan by id
     * @param $planId
     * @return null
     */
    public function getPlan($planId)
    {

        return $this->plansRepo->findWithoutFail($planId);

    }

    /**
     * Get setting
     * @return array
     */
    public function getSubscriptionSettings()
    {

        return [
            'invoice_from' => \Settings::get(SettingsHelper::S_SUBSCRIPTION_INVOICE_FORM),
            'terms_and_cond' => Settings::get(SettingsHelper::S_SUBSCRIPTION_TERMS_AND_COND),
            'notes' => Settings::get(SettingsHelper::S_SUBSCRIPTION_NOTES),
        ];

    }

    /**
     * Process Payment
     * Create invoice
     * Update company subscription time for online payments
     *
     * @param $paymentData
     * @return bool
     */
    public function processPayment($paymentData)
    {

        $plan = $paymentData['plan'];
        $company = $paymentData['company'];
        $user = $paymentData['user'];
        $providerName = $paymentData['provider_name'];
        $providerId = $paymentData['provider_id'];
        $providerStatus = $paymentData['provider_status'];

        $invoice = new SubscriptionInvoice();

        $invoice->invoice_number = $this->generateInvoiceNumber();

        if(isset($paymentData['invoice_date'])){
            $invoice->invoice_date = $paymentData['invoice_date'];
        }else{
            $invoice->invoice_date = Carbon::now();
        }

        $invoice->invoice_from = Settings::get('s_subscription_invoice_from');
        $invoice->terms_and_cond = Settings::get('s_subscription_terms_and_cond');
        $invoice->notes = Settings::get('s_subscription_notes');
        $invoice->invoice_to = SettingsHelper::companySettings(true);
        $invoice->company()->associate($company);
        $invoice->product_name = "Plan " . $plan->name;
        $invoice->currency_name = $plan->currency->code;
        $invoice->price = $plan->full_price;
        $invoice->tax_rate = $plan->tax_rate;
        $invoice->tax_description = $plan->tax_name;
        $invoice->plan_name = $plan->name;
        $invoice->period = $plan->period;


        if ($providerName == 'cash') {
            $invoice->status = 0;
        } else {
            $invoice->status = 1;
        }

        $invoice->provider_name = $providerName;
        $invoice->provider_id = $providerId;
        $invoice->provider_status = $providerStatus;

        if ($invoice->save()) {

            if ($providerName != 'cash') { // For cash you need to update invoice and company account by in Admin Panel
                // Add Subscription Period
                if ($company->subscription_valid_until != null) {
                    if ($plan->period == 'month') {
                        $company->subscription_valid_until = $company->subscription_valid_until->addMonth(1);

                    }
                    if ($plan->period == 'year') {
                        $company->subscription_valid_until = $company->subscription_valid_until->addYear(1);

                    }
                } else {

                    if ($plan->period == 'month') {
                        $company->subscription_valid_until = Carbon::now()->addMonth(1);

                    }
                    if ($plan->period == 'year') {
                        $company->subscription_valid_until = Carbon::now()->addYear(1);
                    }

                }

                $company->user_limit = $plan->teams_limit;
                $company->storage_limit = $plan->storage_limit;
                $company->plan()->associate($plan);
                $company->save();

            }
        }

        return true;
    }


    /**
     * @param Company $company
     * @return mixed
     */
    public function getSubscriptionInvoices(Company $company = null)
    {
        if (empty($company)) {
            $company = \Auth::user()->companyContext();
        }

        return SubscriptionInvoice::orderBy('id', 'desc')->where('company_id', $company->id)->get();
    }

    /**
     * @param $invoiceId
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|SubscriptionInvoice|SubscriptionInvoice[]|null
     */
    public function getSubscriptionInvoice($invoiceId)
    {
        return SubscriptionInvoice::find($invoiceId);
    }

}
