<?php

namespace Modules\ContactWebsites\Entities;

use Bnb\Laravel\Attachments\HasAttachment;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Contacts\Entities\Contact;
use Modules\Platform\Core\Traits\Commentable;

class ContactWebsite extends Model
{

    use BelongsToTenants, Commentable, HasAttachment;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public $table = 'contact_websites';
    public $fillable = [
        'url',
        'type_id',
        'is_default',
        'is_active',
        'contact_id',
        'notes',
    ];
    protected $mustBeApproved = false;

    protected $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }


    /**
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }


}
