<?php

namespace Modules\Platform\Settings\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

class Province extends CachableModel
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
        'name' => 'required|max:255',
    ];
    public $table = 'vaance_province';

    public $fillable = [
        'name',
        'abbr_prov',
        'is_active',
    ];

    protected $dates = ['deleted_at', 'updated_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'abbr_prov' => 'string',
        'is_active' => 'boolean'
    ];
}
