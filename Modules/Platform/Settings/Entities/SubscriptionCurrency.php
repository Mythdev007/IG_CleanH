<?php

namespace Modules\Platform\Settings\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

/**
 * Class SubscriptionCurrency
 *
 * @package Modules\Platform\Settings\Entities
 * @property int $id
 * @property string $name
 * @property string $symbol
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\SubscriptionCurrency newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\SubscriptionCurrency newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\SubscriptionCurrency query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency withoutTrashed()
 * @mixin \Eloquent
 */
class SubscriptionCurrency extends CachableModel
{
    const USD = 'usd';

    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'symbol' => 'required|max:255',
    ];
    public $table = 'vaance_subscription_currency';

    public $fillable = [
        'name',
        'symbol',
        'code'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'symbol' => 'string'
    ];
}
