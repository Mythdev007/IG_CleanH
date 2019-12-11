<?php

namespace Modules\SentEmails\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\SentEmails\Entities\EmailContext
 *
 * @property int $id
 * @property int $email_id
 * @property int $entity_id
 * @property int $company_id
 * @property string $entity_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SentEmails\Entities\EmailContext onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SentEmails\Entities\EmailContext withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SentEmails\Entities\EmailContext withoutTrashed()
 * @mixin \Eloquent
 */
class EmailContext extends Model
{
    use SoftDeletes, BelongsToTenants;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'email_context';

    public $fillable = [
        'name',
        'email_id',
        'entity_id',
        'entity_type',
        'company_id'

    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

}
