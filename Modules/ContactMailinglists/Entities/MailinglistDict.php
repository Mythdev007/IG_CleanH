<?php

namespace Modules\ContactMailinglists\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;


class MailinglistDict extends CachableModel
{

    use SoftDeletes, BelongsToTenants;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public $table = 'mailinglist_dict';

    public $fillable = [
        'name',
        'company_id'
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
