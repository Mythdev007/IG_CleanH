<?php

namespace Modules\Platform\Settings\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

/**
 * Class EmailTemplate
 *
 * @package Modules\Platform\Settings\Entities
 * @property int $id
 * @property string|null $name
 * @property string|null $subject
 * @property string|null $message
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\EmailTemplate newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\EmailTemplate newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\EmailTemplate onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\EmailTemplate query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\EmailTemplate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\EmailTemplate withoutTrashed()
 * @mixin \Eloquent
 */
class EmailTemplate extends CachableModel
{
    use SoftDeletes,  BelongsToTenants;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $table = 'vaance_email_template';
    public $fillable = [
        'name',
        'subject',
        'message',
        'company_id'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
