<?php

namespace Modules\Platform\Companies\Entities;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Companies\Service\CompanyService;
use Modules\Platform\Core\Helper\UserHelper;
use Modules\Platform\User\Entities\User;
use Modules\Subscription\Entities\SubscriptionInvoice;


/**
 * Modules\Platform\Companies\Entities\Company
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $is_enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereIsEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $user_limit
 * @property int|null $storage_limit
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereUserLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereStorageLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company query()
 * @property int|null $plan_id
 * @property string|null $stripe_id
 * @property string|null $braintree_id
 * @property string|null $paypal_email
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $trial_ends_at
 * @property-read \Modules\Platform\Companies\Entities\CompanyPlan|null $plan
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Companies\Entities\CompanyPlan[] $subscriptionPlans
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[] $subscriptions
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereBraintreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company wherePaypalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereTrialEndsAt($value)
 * @property \Illuminate\Support\Carbon|null $subscription_valid_until
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Subscription\Entities\SubscriptionInvoice[] $subscriptionInvoices
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereSubscriptionValidUntil($value)
 */
class Company extends Model
{

    use SoftDeletes;

    public $table = 'vaance_companies';

    protected $fillable = [
        'name',
        'description',
        'is_enabled',
        'user_limit',
        'storage_limit',
        'subscription_valid_until',
        'plan_id'
    ];

    protected $dates = ['created_at', 'updated_at','deleted_at', 'subscription_valid_until'];

    public function plan() // Our Plan
    {
        return $this->belongsTo(CompanyPlan::class);
    }

    public function subscriptionInvoices()
    {
        return $this->hasMany(SubscriptionInvoice::class, 'company_id');
    }


    public static function boot()
    {
        parent::boot();

        static::created(function (Company $company) {

            $companyService = \App::make(CompanyService::class);

            $companyService->seedCompany($company);

        });

        static::deleted(function (Company $company){

            User::whereCompanyId($company->id)->delete();

        });

    }


}
