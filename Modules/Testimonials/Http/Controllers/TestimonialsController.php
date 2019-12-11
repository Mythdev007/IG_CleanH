<?php

namespace Modules\Testimonials\Http\Controllers;

use inputBasicList;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;

use Modules\Testimonials\Datatables\TestimonialsDatatable;
use Modules\Testimonials\Entities\Testimonial;
use Modules\Testimonials\Http\Forms\TestimonialsForm;
use Modules\Testimonials\Http\Requests\TestimonialsRequest;

class TestimonialsController extends ModuleCrudController
{

    protected $datatable = TestimonialsDatatable::class;
    protected $formClass = TestimonialsForm::class;
    protected $storeRequest = TestimonialsRequest::class;
    protected $updateRequest = TestimonialsRequest::class;
    protected $entityClass = Testimonial::class;

    protected $moduleName = 'testimonials';

    protected $showMassActionButtons = true;


    protected $permissions = [
        'browse' => 'testimonials.browse',
        'create' => 'testimonials.create',
        'update' => 'testimonials.update',
        'destroy' => 'testimonials.destroy'
    ];

    protected $moduleSettingsLinks = [
        ['route' => 'testimonials.nps_type.index', 'label' => 'settings.nps_type'],
        ['route' => 'testimonials.product_group.index', 'label' => 'settings.product_group'],
        ['route' => 'testimonials.status_type.index', 'label' => 'settings.status_type'],
        ['route' => 'testimonials.usage_type.index', 'label' => 'settings.usage_type'],
        ['route' => 'testimonials.vip_type.index', 'label' => 'settings.vip_type'],
    ];

    protected $settingsPermission = 'testimonials.settings';

    protected $showFields = [

        'information' => [

            'product_id' => [
                'type' => 'manyToOne',
                'relation' => 'product',
                'column' => 'name',
                'dont_translate' => true,
                'col-class' => 'col-lg-6 col-md-6 col-sm-6 col-xs-6'
            ],

            'contact_id' => [
                'type' => 'manyToOne',
                'relation' => 'contact',
                'column' => 'full_name',
                'dont_translate' => true,
                'col-class' => 'col-lg-6 col-md-6 col-sm-6 col-xs-6'
            ],
        ],

        'instructions' => [

            'read_this' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],
        ],

        'testimonial' => [

            'testimonial_title' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],

            'testimonial' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],

            'usage_id' => [
                'type' => 'manyToOne',
                'relation' => 'usage',
                'column' => 'name',

                'col-class' => 'col-lg-4 col-md-4 col-sm-4'
            ],

            'published_at' => [
                'type' => 'date',
                'col-class' => 'col-lg-4 col-md-4 col-sm-4'
            ],

            'status_id' => [
                'type' => 'manyToOne',
                'relation' => 'status',
                'column' => 'name',
                'col-class' => 'col-lg-4 col-md-4 col-sm-4'
            ],

        ],


        'training' => [

            'tr_personalbenefit' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'tr_professionalbenefit' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'tr_problem' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],

        ],

        'therapy' => [

            'th_goal' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'th_lifebefore' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'th_lifeafter' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'th_evidenceafter' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'th_experience' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],



        ],


        'evaluation' => [

            'likedmost' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'likedleast' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'grade' => [
                'type' => 'number',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'nps_id' => [
                'type' => 'manyToOne',
                'relation' => 'nps',
                'column' => 'name',
                'dont_translate' => true,
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

        ],


        'video' => [

            'testimonial_video' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],

            'testimonial_video_comment' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],

        ],

        'signature' => [

            'sig_name' => [
                'type' => 'text',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'sig_tagline' => [
                'type' => 'text',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'vip_id' => [
                'type' => 'manyToOne',
                'relation' => 'vip',
                'column' => 'name',
//                'dont_translate' => true,
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'sig_email' => [
                'type' => 'text',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'sig_site' => [
                'type' => 'text',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'sig_profession' => [
                'type' => 'text',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'sig_country' => [
                'type' => 'text',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'sig_city' => [
                'type' => 'text',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

            'sig_date' => [
                'type' => 'date',
                'col-class' => 'col-lg-6 col-md-6 col-sm-6'
            ],

        ],

        'comment' => [

            'comment' => [
                'type' => 'wyswig',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12'
            ],

        ],

    ];

    protected $languageFile = 'testimonials::testimonials';

    protected $routes = [
        'index' => 'testimonials.testimonials.index',
        'create' => 'testimonials.testimonials.create',
        'show' => 'testimonials.testimonials.show',
        'edit' => 'testimonials.testimonials.edit',
        'store' => 'testimonials.testimonials.store',
        'destroy' => 'testimonials.testimonials.destroy',
        'update' => 'testimonials.testimonials.update'
    ];

    public function __construct()
    {
        parent::__construct();

    }

}
