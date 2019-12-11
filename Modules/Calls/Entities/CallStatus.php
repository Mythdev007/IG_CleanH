<?php

namespace Modules\Calls\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;


/**
 * Modules\Calls\Entities\CallStatus
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Calls\Entities\CallStatus newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Calls\Entities\CallStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\CallStatus onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Calls\Entities\CallStatus query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\CallStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\CallStatus withoutTrashed()
 * @mixin \Eloquent
 */
class CallStatus extends CachableModel
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
    public $table = 'calls_dict_status';

    public $fillable = [
        'name',
        'company_id'
    ];


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


}
