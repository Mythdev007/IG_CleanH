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
 * Modules\Products\Entities\PriceList
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\PriceList[] $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\PriceList[] $owner
 * @property-read \Modules\Products\Entities\Product|null $product
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\PriceList onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\PriceList withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\PriceList withoutTrashed()
 * @mixin \Eloquent
 * @property int|null $currency_id
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $currency
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereCurrencyId($value)
 */
class PriceList extends Model implements Ownable
{
    use SoftDeletes, HasMorphOwner, LogsActivity, Commentable, HasAttachment, BelongsToTenants;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public static function boot()
    {
        parent::boot();

        static::saved(function (PriceList $priceList) {

            if ($priceList->product->priceList()->count() > 0) {

                $priceBook = $priceList->product->priceList()->first();

                $priceList->product->price = $priceBook->price;
                $priceList->product->save();
            }
        });
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    protected static $logAttributes = [
        'name',
        'price',
        'product.name',
        'ownedBy.name',
    ];
    public $table = 'price_list';
    public $fillable = [
        'name',
        'price',
        'product_id',
        'company_id'
    ];
    protected $mustBeApproved = false;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $appends = array('nameProduct');

    public function getNameProductAttribute(){

        return $this->product->name.' - '.$this->name;
    }


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

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
