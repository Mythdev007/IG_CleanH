<?php

namespace Modules\Testimonials\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;

class TestimonialVipType extends CachableModel
{
    use SoftDeletes, BelongsToTenants;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public $table = 'testimonials_dict_vip';

    public $fillable = [
        'name',
        'company_id'
    ];

    protected $dates = [
        'updated_at',
        'created_at'
    ];
}
