<?php

namespace Modules\Orders\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

/**
 * Modules\Orders\Entities\OrderStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus query()
 * @property int|null $company_id
 * @property string|null $system_name
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereSystemName($value)
 * @property string|null $icon
 * @property string|null $color
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereIcon($value)
 */
class OrderStatus extends CachableModel
{
    use SoftDeletes, BelongsToTenants;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public $table = 'orders_dict_status';

    public $fillable = [
        'name',
        'icon',
        'color',
        'system_name',
        'company_id'
    ];


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
