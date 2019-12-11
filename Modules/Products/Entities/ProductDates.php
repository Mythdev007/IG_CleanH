<?php

namespace Modules\Products\Entities;

use Bnb\Laravel\Attachments\HasAttachment;
use Cog\Contracts\Ownership\Ownable;
use Cog\Laravel\Ownership\Traits\HasMorphOwner;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Core\Entities\CachableModel;
use Modules\Platform\Core\Helper\ActivityLogHelper;
use Modules\Platform\Core\Traits\Commentable;
use Modules\Platform\Settings\Entities\Currency;
use Spatie\Activitylog\Traits\LogsActivity;


/**
 * Modules\Products\Entities\ProductDates
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $price
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $company_id
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read mixed $name_product
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\ProductDates[] $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\ProductDates[] $owner
 * @property-read \Modules\Products\Entities\Product|null $product
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductDates onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductDates withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductDates withoutTrashed()
 * @mixin \Eloquent
 * @property int|null $currency_id
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $currency
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereCurrencyId($value)
 */
class ProductDates extends Model implements Ownable
{
    use SoftDeletes, HasMorphOwner, LogsActivity, Commentable, HasAttachment, BelongsToTenants;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public static function boot()
    {
        parent::boot();
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    protected static $logAttributes = [
        'product_date',
        'product.name',
        'ownedBy.name',
    ];
    public $table = 'products_dates';
    public $fillable = [
        'product_date',
        'product_id',
        'company_id'
    ];
    protected $mustBeApproved = false;
    protected $dates = ['deleted_at', 'created_at', 'updated_at','product_date'];

    /**
     * @param  Model $model
     * @param  string $attribute
     * @return  array
     */
    protected static function getRelatedModelAttributeValue(Model $model, string $attribute): array
    {
        return ActivityLogHelper::getRelatedModelAttributeValue($model, $attribute);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
