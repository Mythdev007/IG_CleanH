<?php

namespace Modules\Invoices\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;


/**
 * Modules\Invoices\Entities\InvoiceRecurringPeriod
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $system_name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Invoices\Entities\InvoiceRecurringPeriod newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Invoices\Entities\InvoiceRecurringPeriod newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Invoices\Entities\InvoiceRecurringPeriod query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereSystemName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod withoutTrashed()
 * @mixin \Eloquent
 */
class InvoiceRecurringPeriod extends CachableModel
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
    public $table = 'invoices_dict_recurring_period';

    public $fillable = [
        'name',
        'system_name',
        'company_id'
    ];


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
