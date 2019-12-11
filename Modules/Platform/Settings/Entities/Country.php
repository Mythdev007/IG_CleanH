<?php

namespace Modules\Platform\Settings\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

/**
 * Class Country
 *
 * @package Modules\Platform\Settings\Entities
 * @property int $id
 * @property string $name
 * @property string|null $alpha2
 * @property string|null $alpha3
 * @property string|null $continent
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\Country newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\Country newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Country onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\Country query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereAlpha2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereAlpha3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereContinent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Country withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Country withoutTrashed()
 * @mixin \Eloquent
 */
class Country extends CachableModel
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
        'name' => 'required|max:255',
    ];
    public $table = 'vaance_country';

    public $fillable = [
        'name',
        'alpha2',
        'alpha3',
        'is_active',
        'continent',
        'company_id'
    ];

    protected $dates = ['deleted_at', 'updated_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'alpha2' => 'string',
        'alpha3' => 'string',
        'is_active' => 'boolean'
    ];
}
