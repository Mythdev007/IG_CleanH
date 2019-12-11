<?php

namespace Modules\ContactEmails\Entities;

use Bnb\Laravel\Attachments\HasAttachment;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Modules\ContactEmails\Service\ContactEmailService;
use Modules\Contacts\Entities\Contact;
use Modules\Platform\Core\Traits\Commentable;

/**
 * Modules\ContactEmails\Entities\ContactEmail
 *
 * @property int $id
 * @property string|null $email
 * @property int $is_default
 * @property int $is_active
 * @property int $is_marketing
 * @property int|null $contact_id
 * @property int|null $company_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Contacts\Entities\Contact|null $contact
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactEmails\Entities\ContactEmail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereIsMarketing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactEmails\Entities\ContactEmail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactEmails\Entities\ContactEmail withoutTrashed()
 * @mixin \Eloquent
 */
class ContactEmail extends Model
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
    public $table = 'contact_email';
    public $fillable = [
        'email',
        'is_default',
        'is_active',
        'is_marketing',
        'contact_id',
        'company_id',
        'notes',
    ];
    protected $mustBeApproved = false;

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::saved(function(ContactEmail $contactEmail){

            $contactEmailService = App::make(ContactEmailService::class);

            $contactEmailService->manageContactMultiEmail($contactEmail);

        });
    }


    /**
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }


}
