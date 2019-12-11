<?php

namespace Modules\LeadEmails\Entities;

use Bnb\Laravel\Attachments\HasAttachment;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Modules\LeadEmails\Service\LeadEmailService;
use Modules\Leads\Entities\Lead;
use Modules\Platform\Core\Traits\Commentable;

/**
 * Modules\LeadEmails\Entities\LeadEmail
 *
 * @property int $id
 * @property string|null $email
 * @property int $is_default
 * @property int $is_active
 * @property int $is_marketing
 * @property int|null $lead_id
 * @property int|null $company_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Leads\Entities\Lead|null $lead
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\LeadEmails\Entities\LeadEmail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereIsMarketing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\LeadEmails\Entities\LeadEmail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\LeadEmails\Entities\LeadEmail withoutTrashed()
 * @mixin \Eloquent
 */
class LeadEmail extends Model
{

    use SoftDeletes, BelongsToTenants, Commentable, HasAttachment;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public $table = 'lead_email';
    public $fillable = [
        'email',
        'is_default',
        'is_active',
        'is_marketing',
        'lead_id',
        'company_id',
        'notes',
    ];
    protected $mustBeApproved = false;

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::saved(function(LeadEmail $leadEmail){

            $leadEmailService = App::make(LeadEmailService::class);

            $leadEmailService->manageLeadMultiEmail($leadEmail);

        });
    }


    /**
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }


}
