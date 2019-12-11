<?php

namespace Modules\Campaigns\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Companies\Entities\Company;

/**
 * Modules\Campaigns\Entities\EmailCampaign
 *
 * @property int $id
 * @property string|null $subject
 * @property string|null $from
 * @property string|null $body
 * @property string|null $email_host
 * @property string|null $email_port
 * @property string|null $email_username
 * @property string|null $email_password
 * @property string|null $email_encryption
 * @property string|null $email_from_address
 * @property string|null $email_from_name
 * @property int $test_mode
 * @property string|null $email_test
 * @property int|null $leads_to_sent
 * @property int|null $contacts_to_sent
 * @property int|null $accounts_to_sent
 * @property int|null $campaign_id
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\Campaigns\Entities\Campaign|null $campaign
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\EmailCampaign onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereAccountsToSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereCampaignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereContactsToSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailEncryption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailFromAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereLeadsToSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereTestMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\EmailCampaign withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\EmailCampaign withoutTrashed()
 * @mixin \Eloquent
 */
class EmailCampaign extends Model
{
    use SoftDeletes, BelongsToTenants;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'email_campaigns';

    public $fillable = [
        'subject',
        'from',
        'body',
        'leads_to_sent',
        'contacts_to_sent',
        'accounts_to_sent',

        'email_host',
        'email_port',
        'email_username',
        'email_password',
        'email_encryption',
        'email_from_address',
        'email_from_name',
        'test_mode',
        'email_test',

        'campaign_id',
        'company_id'
    ];

    protected $attributes = [
        'leads_to_sent' => 0,
        'contacts_to_sent' => 0,
        'accounts_to_sent' => 0
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
