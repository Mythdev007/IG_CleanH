<?php

namespace Modules\Contacts\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

/**
 * Modules\Contacts\Entities\CustomerLanguage
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Contacts\Entities\CustomerLanguage newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Contacts\Entities\CustomerLanguage newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\CustomerLanguage onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Contacts\Entities\CustomerLanguage query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\CustomerLanguage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\CustomerLanguage withoutTrashed()
 * @mixin \Eloquent
 */
class CustomerLanguage extends CachableModel
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
    public $table = 'customer_dict_language';

    public $fillable = [
        'name',
        'code',
        'company_id'
    ];


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
