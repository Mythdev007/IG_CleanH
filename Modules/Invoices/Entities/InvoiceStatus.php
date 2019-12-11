<?php

namespace Modules\Invoices\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

/**
 * Modules\Invoices\Entities\InvoiceStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus query()
 * @property int|null $company_id
 * @property string|null $system_name
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereSystemName($value)
 */
class InvoiceStatus extends CachableModel
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
    public $table = 'invoices_dict_status';

    public $fillable = [
        'name',
        'system_name',
        'company_id'
    ];


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
