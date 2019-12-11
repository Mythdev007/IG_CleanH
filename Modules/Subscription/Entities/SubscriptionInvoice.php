<?php


namespace Modules\Subscription\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Core\Helper\UserHelper;
use Modules\Subscription\Service\SubscriptionService;

/**
 * Class SubscriptionInvoice
 *
 * @package Modules\Subscription\Entities
 * @property int $id
 * @property string|null $product_name
 * @property string|null $invoice_number
 * @property \Illuminate\Support\Carbon|null $invoice_date
 * @property string|null $invoice_from
 * @property string|null $invoice_to
 * @property string|null $terms_and_cond
 * @property string|null $notes
 * @property float|null $price
 * @property float|null $tax_value
 * @property string|null $tax_description
 * @property string|null $currency_name
 * @property string|null $provider_name
 * @property string|null $provider_id
 * @property string|null $provider_status
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereInvoiceFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereInvoiceTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereProviderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereProviderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereTaxDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereTaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereTermsAndCond($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property float|null $tax_rate
 * @property int|null $status
 * @property string|null $plan_name
 * @property string|null $period
 * @property-read mixed $total
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice wherePlanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereTaxRate($value)
 */
class SubscriptionInvoice extends Model
{

    public $table = 'vaance_subscription_invoice';

    protected $fillable = [

        'product_name',
        'invoice_number',
        'invoice_date',
        'invoice_from',
        'invoice_to',
        'terms_and_cond',
        'notes',
        'price',
        'tax_rate',
        'tax_description',
        'currency_name',
        'provider_name',
        'provider_id',
        'provider_status',
        'status',
        'plan_name',
        'period',
        'company_id'
    ];

    protected $dates = ['created_at', 'updated_at','start_date'];

    protected $appends = ['total', 'tax_value'];

    public function getTaxValueAttribute()
    {
        if (!empty($this->tax_rate)) {

            return ($this->price / 100) * $this->tax_rate;

        }
        return 0;
    }

    public function getTotalAttribute()
    {

        if (!empty($this->tax_rate)) {

            $taxToPay = ($this->price / 100) * $this->tax_rate;

            $total = $this->price + $taxToPay;

            return $total;

        }

        return $this->price;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function download($data = [])
    {

        $ss = App::make(SubscriptionService::class);

        $data['invoice'] = $this;
        $data['subscriptionSettings'] = $ss->getSubscriptionSettings();

        $pdf = \PDF::loadView('subscription::print', $data);

        return $pdf->inline(Str::slug($this->invoice_number) . '_INVOICE.pdf');


    }

}
