<?php

namespace Modules\PolizzaCar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

class PolizzaCarCategory extends CachableModel
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
    public $table = 'polizza_car_category';

    public $fillable = [
        'name',
    ];


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
