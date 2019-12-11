<?php

namespace Modules\ContactWebsites\Entities;

use Modules\Platform\Core\Entities\CachableModel;


class WebsiteTypes  extends CachableModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public $table = 'vaance_website_dict_types';

    public $fillable = [
        'names',
    ];


    protected $dates = [];
}
