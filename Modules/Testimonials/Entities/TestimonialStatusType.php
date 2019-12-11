<?php

namespace Modules\Testimonials\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Platform\Core\Entities\CachableModel;


class TestimonialStatusType extends CachableModel
{
    use SoftDeletes, BelongsToTenants;

    public $table = 'testimonials_dict_status';

    public $fillable = [
        'name',
        'company_id'
    ];

    protected $dates = [
        'updated_at',
        'created_at'
    ];
}
