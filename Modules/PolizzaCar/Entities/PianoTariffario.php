<?php

namespace Modules\PolizzaCar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

class PianoTariffario extends CachableModel
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
    public $table = 'polizza_car_piano_tariffario';

    public $fillable = [
        'name',
        '24_month',
        '36_month',
        'tax_rate',
        'commission'
    ];


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

       /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];
}
