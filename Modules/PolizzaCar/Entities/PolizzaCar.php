<?php

namespace Modules\PolizzaCar\Entities;

use Cog\Contracts\Ownership\Ownable;
use Cog\Laravel\Ownership\Traits\HasMorphOwner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Core\Helper\ActivityLogHelper;
use Modules\Platform\Settings\Entities\Country;
use Modules\Platform\Core\Traits\Commentable;
use Spatie\Activitylog\Traits\LogsActivity;
use Bnb\Laravel\Attachments\HasAttachment;
use Carbon\Carbon;

class PolizzaCar extends Model implements Ownable
{
    use SoftDeletes, HasMorphOwner, LogsActivity, Commentable, HasAttachment;

    protected $withDefaultOwnerOnCreate = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // const STATUS_DRAFT = 'Bozza';
    const STATUS_SAVED = '2';
    // const STATUS_APPROVED = '3';
    // const STATUS_REJECTED = '4';
    
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    
    protected static $logAttributes = [
        /* 'user_id',
        'procurement_id',
        'status_id',
        'date_request',
        'date_effect',
        'date_expire',
        'order_sent_at',
        'envelope_id',
        'company_name',
        'company_vat',
        'company_email',
        'company_phone',
        'company_address',
        'company_city',
        'company_cap',
        'company_provincia',
        'company_activity',
        'referente_name',
        'referente_email',
        'referente_phone',
        'contract_code',
        'works_type_id',
        'works_type_details',
        'works_descr',
        'works_duration_dd',
        'works_duration_mm',
        'works_place_city',
        'manteniance_coverage',
        'cvg_decennial_liability',
        'car_p1_limit_amount',
        'car_p2_limit_amount',
        'car_p3_limit_amount',
        'country_id',
        'risk_id',
        'coeff_tariffa',
        'tax_rate' */
    ];

    public $table = 'polizza_car';
    
    public $fillable = [
        'user_id',
        'group_id',
        'owned_by_id',
        'buyer_id',
        'procurement_id',
        'status_id',
        'date_request',
        'policy_effect_date',
        'policy_expire_date',
        'order_sent_at',
        'envelope_id',
        'company_name',
        'company_address',
        'company_email',
        'company_phone',
        'company_cap',
        'company_city',
        'company_provincia',
        'company_vat',
        'country_id',
        'contract_code',
        'works_type_details',
        'works_descr',
        'works_duration_dd',
        'works_duration_mm',
        'works_place_city',
        'works_place_pr',
        'works_place_region',
        'car_p1_limit_amount',
        'car_p1_premium_gross',
        'car_p1_premium_net',
        'car_p2_limit_amount',
        'car_p2_premium_gross',
        'car_p2_premium_net',
        'car_p3_limit_amount',
        'car_p3_premium_gross',
        'car_p3_premium_net',
        'risk_id',
        'coeff_tariffa',
        'tax_rate',
        'pdf_signed_contract',
        'pdf_payment_proof'
        


    ];
    protected $mustBeApproved = false;
    protected $dates = ['date_request','policy_effect_date','policy_expire_date', 'order_sent_at', 'deleted_at', 'created_at', 'updated_at'];

    protected $appends = [
        'car_p1_premium_gross',
        'car_p1_premium_net',
        'car_p2_premium_gross',
        'car_p2_premium_net',
        'car_p3_premium_gross',
        'car_p3_premium_net',
        'sezione_b_terms',
        'partite_total',
        'total_gross',
        'total_net'
    ];

    /**
     * @param  Model $model
     * @param  string $attribute
     * @return  array
     */
    protected static function getRelatedModelAttributeValue(Model $model, string $attribute): array
    {
        return ActivityLogHelper::getRelatedModelAttributeValue($model, $attribute);
    }

    /**
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function procurement()
    {
        return $this->belongsTo(PolizzaCarProcurement::class);
    }
    public function works_type()
    {
        return $this->belongsTo(PolizzaCarWorksType::class, 'works_type_details');
    }
    public function status()
    {
        return $this->belongsTo(PolizzaCarStatus::class);
    }

    public function tariffa()
    {
        return $this->belongsTo(PianoTariffario::class, 'risk_id');
    } 

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getCarCivilLiabilityAttribute()
    {
        return '€ 5.000.000,00';
    }
    public function getSezioneBTermsAttribute()
    {
        return 'sempre inclusa';
    }

    public function getCarP1PremiumGrossAttribute()
    {
        if ($this->tariffa) {
            if ($this->works_duration_mm == '24') {
                $calc = ($this->car_p1_limit_amount) * ($this->tariffa->mm_24) / 1000;
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            }
            else {
                $calc = ($this->car_p1_limit_amount) * ($this->tariffa->mm_36) / 1000;
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            }
        }
    }

    public function getCarP1PremiumNetAttribute()
    {
        if ($this->tariffa) {
            if ($this->works_duration_mm == '24') {
                $calc = ($this->car_p1_limit_amount) * ($this->tariffa->mm_24) / 1000;
                $calc = $calc / ( 1 + ($this->tariffa->tax_rate) / 100 );
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            } else {
                $calc = ($this->car_p1_limit_amount) * ($this->tariffa->mm_36) / 1000;
                $calc = $calc / ( 1 + ($this->tariffa->tax_rate) / 100 );
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            }
        }
    }

    public function getCarP2PremiumGrossAttribute()
    {
        if ($this->tariffa) {
            if ($this->works_duration_mm == '24') {
                $calc = ($this->car_p2_limit_amount) * ($this->tariffa->mm_24) / 1000;
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            }
            else {
                $calc = ($this->car_p2_limit_amount) * ($this->tariffa->mm_36) / 1000;
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            }
        }
    }

    public function getCarP2PremiumNetAttribute()
    {
        if ($this->tariffa) {
            if ($this->works_duration_mm == '24') {
                $calc = ($this->car_p2_limit_amount) * ($this->tariffa->mm_24) / 1000;
                $calc = $calc / ( 1 + ($this->tariffa->tax_rate) / 100 );
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            } else {
                $calc = ($this->car_p2_limit_amount) * ($this->tariffa->mm_36) / 1000;
                $calc = $calc / ( 1 + ($this->tariffa->tax_rate) / 100 );
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            }
        }
    }
    public function getCarP3PremiumGrossAttribute()
    {
        if ($this->tariffa) {
            if ($this->works_duration_mm == '24') {
                $calc = ($this->car_p3_limit_amount) * ($this->tariffa->mm_24) / 1000;
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            }
            else {
                $calc = ($this->car_p3_limit_amount) * ($this->tariffa->mm_36) / 1000;
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            }
        }
    }
    public function getCarP3PremiumNetAttribute()
    {
        if ($this->tariffa) {
            if ($this->works_duration_mm == '24') {
                $calc = ($this->car_p3_limit_amount) * ($this->tariffa->mm_24) / 1000;
                $calc = $calc / ( 1 + ($this->tariffa->tax_rate) / 100 );
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            } else {
                $calc = ($this->car_p3_limit_amount) * ($this->tariffa->mm_36) / 1000;
                $calc = $calc / ( 1 + ($this->tariffa->tax_rate) / 100 );
                return '€ ' . number_format((double)$calc, 2, ',', '.');
            }
        }
    }
    /**
     * Get Total Valori Assicurati - Somma p1+p2+p3
     * @return string
     */
    public function getPartiteTotalAttribute()
    {
        $subtotal = 0;
        
        $subtotal = $this->car_p1_limit_amount + $this->car_p2_limit_amount + $this->car_p3_limit_amount;
        return '€ ' . number_format((double)$subtotal, 2, ',', '.');
    }
    public function getTotalGrossAttribute()
    {
        $subtotal = 0;
        if ($this->tariffa) {
            if ($this->works_duration_mm == '24') {
                $subtotal += ($this->car_p1_limit_amount) * ($this->tariffa->mm_24) / 1000;
                $subtotal += ($this->car_p2_limit_amount) * ($this->tariffa->mm_24) / 1000;
                $subtotal += ($this->car_p3_limit_amount) * ($this->tariffa->mm_24) / 1000;
            }
            else {
                $subtotal += ($this->car_p1_limit_amount) * ($this->tariffa->mm_36) / 1000;
                $subtotal += ($this->car_p2_limit_amount) * ($this->tariffa->mm_36) / 1000;
                $subtotal += ($this->car_p3_limit_amount) * ($this->tariffa->mm_36) / 1000;
            }
        }
        return '€ ' . number_format((double)$subtotal, 2, ',', '.');
    }
    public function getTotalNetAttribute()
    {
        $subtotal = 0;
        if ($this->tariffa) {
            if ($this->works_duration_mm == '24') {
                $subtotal += (($this->car_p1_limit_amount) * ($this->tariffa->mm_24) / 1000) / ( 1 + ($this->tariffa->tax_rate) / 100 );
                $subtotal += (($this->car_p2_limit_amount) * ($this->tariffa->mm_24) / 1000) / ( 1 + ($this->tariffa->tax_rate) / 100 );
                $subtotal += (($this->car_p3_limit_amount) * ($this->tariffa->mm_24) / 1000) / ( 1 + ($this->tariffa->tax_rate) / 100 );
            }
            else {
                $subtotal += (($this->car_p1_limit_amount) * ($this->tariffa->mm_36) / 1000) / ( 1 + ($this->tariffa->tax_rate) / 100 );
                $subtotal += (($this->car_p2_limit_amount) * ($this->tariffa->mm_36) / 1000) / ( 1 + ($this->tariffa->tax_rate) / 100 );
                $subtotal += (($this->car_p3_limit_amount) * ($this->tariffa->mm_36) / 1000) / ( 1 + ($this->tariffa->tax_rate) / 100 );
            }
        }
        return '€ ' . number_format((double)$subtotal, 2, ',', '.');
    }
}
