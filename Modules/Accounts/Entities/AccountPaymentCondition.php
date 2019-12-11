<?php

namespace Modules\Accounts\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;


class AccountPaymentCondition extends CachableModel
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
    public $table = 'accounts_dict_payment_condition';

    public $fillable = [
        'name',
        'numeric_value',
        'company_id'
    ];


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
