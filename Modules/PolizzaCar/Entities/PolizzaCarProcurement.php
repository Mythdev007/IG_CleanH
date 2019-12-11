<?php

namespace Modules\PolizzaCar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;
use Modules\Platform\Settings\Entities\Country;

class PolizzaCarProcurement extends CachableModel
{
    use SoftDeletes;


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public $table = 'polizza_car_procurement';

    public $fillable = [
        'name',
        'company_name',
        'company_vat',
        'company_email',
        'company_phone',
        'company_address',
        'company_city',
        'company_cap',
        'company_provincia',
        'country_id',
        'subject_procurement',
            'company_activity',
            'referente_name',
            'referente_email',
            'referente_phone',
            'contract_code',
            'works_type_id',
            'works_type_details',
            'works_descr'=> 'sometimes|nullable',
            'works_duration_dd',
            'works_duration_mm',
            'works_place_city',
            'works_place_pr',
            'procurement_total',
            'insurance_policy'
    ];


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

       /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'company_name' => 'string', 
        'company_vat' => 'string',
        'company_email' => 'string',
        'company_phone' => 'string',
        'company_address' => 'string',
        'company_city' => 'string',
        'company_cap' => 'string',
        'company_provincia' => 'string',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function works_type()
    {
        return $this->belongsTo(PolizzaCarWorksType::class, 'works_type_details');
    }
    
}
