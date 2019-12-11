<?php

namespace Modules\Platform\Companies\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Platform\Settings\Entities\SubscriptionCurrency;
use Modules\Platform\User\Repositories\UserRepository;
use Spatie\Permission\Traits\HasPermissions;


/**
 * Modules\Platform\Companies\Entities\CompanyPlan
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $api_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_active
 * @property string|null $color
 * @property int $featured
 * @property int $is_free
 * @property float|null $price
 * @property string|null $period
 * @property float|null $tax_rate
 * @property string|null $tax_name
 * @property string|null $features_list
 * @property int|null $teams_limit
 * @property int|null $storage_limit
 * @property int $orderby
 * @property int $plan_type
 * @property int|null $currency_id
 * @property-read \Modules\Platform\Settings\Entities\SubscriptionCurrency|null $currency
 * @property-read mixed $can_purchase
 * @property-read mixed $full_price
 * @property-read mixed $full_price_cents
 * @property-read mixed $tax_value
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereApiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereFeaturesList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereIsFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereOrderby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan wherePlanType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereStorageLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereTaxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereTaxRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereTeamsLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyPlan extends Model
{
    use HasPermissions;

    protected $guard_name = 'web';

    const ASSIGN_PLAN_ON_REGISTER = 4;

    const TRIAL = self::ASSIGN_PLAN_ON_REGISTER;

    public $table = 'vaance_companies_plan';

    protected $fillable = [
        'name',
        'description',
        'api_name',
        'is_active',
        'color',
        'featured',
        'price',
        'period',
        'teams_limit',
        'storage_limit',
        'orderby',
        'currency_id',
        'features_list',
        'is_free',
        'tax_name',
        'tax_rate',
        'plan_type'
    ];

    public function currency()
    {
        return $this->belongsTo(SubscriptionCurrency::class);
    }

    protected $appends = ['full_price', 'tax_value', 'full_price_cents', 'can_purchase'];

    public function getCanPurchaseAttribute()
    {

        $company = \Auth::user()->companyContext();

        $userRepo = App::make(UserRepository::class);

        $usersCount = $userRepo->countUsersForCompany($company);

        if ($this->teams_limit == null || $usersCount <= $this->teams_limit) {
            return true;
        }
        return false;
    }

    public function getFullPriceCentsAttribute()
    {
        if (!empty($this->tax_rate)) {

            $taxToPay = ($this->price / 100) * $this->tax_rate;

            $total = $this->price + $taxToPay;

            (int)(string)$total * 100;

        }

        return (int)(string)$this->price * 100;
    }

    public function getTaxValueAttribute()
    {
        if (!empty($this->tax_rate)) {

            return ($this->price / 100) * $this->tax_rate;

        }
        return 0;
    }

    public function getFullPriceAttribute()
    {

        if (!empty($this->tax_rate)) {

            $taxToPay = ($this->price / 100) * $this->tax_rate;

            $total = $this->price + $taxToPay;

            return $total;

        }

        return $this->price;
    }

    public static function boot()
    {
        parent::boot();

    }

}
