<?php

namespace Modules\Testimonials\Http\Forms;


use Kris\LaravelFormBuilder\Form;
use Modules\Testimonials\Entities\TestimonialStatusType;
use Modules\Testimonials\Entities\TestimonialNpsType;
use Modules\Testimonials\Entities\TestimonialVipType;
use Modules\Testimonials\Entities\TestimonialUsageType;

class TestimonialsForm extends Form
{
    public function buildForm()
    {

        $this->add('product_id', 'manyToOne', [
            'search_route' => route('products.products.index', ['mode' => 'modal']),
            'relation' => 'product',
            'relation_field' => 'name',
            'model' => $this->model,
            'attr' => ['class' => 'form-control manyToOne'],
            'label' => trans('testimonials::testimonials.form.product_id'),
            'empty_value' => trans('core::core.empty_select')
        ]);

        $this->add('contact_id', 'manyToOne', [
            'search_route' => route('contacts.contacts.index', ['mode' => 'modal']),
            'relation' => 'contact',
            'relation_field' => 'full_name',
            'model' => $this->model,
            'attr' => ['class' => 'form-control manyToOne'],
            'label' => trans('testimonials::testimonials.form.contact_id'),
            'empty_value' => trans('core::core.empty_select')
        ]);

        $this->add('read_this', 'static', [
            'tag' => 'div', // Tag to be used for holding static data,
            'attr' => ['class' => 'form-control-static'], // This is the default
            'label' => trans('testimonials::testimonials.form.read_this_title'),
            'value' => trans('testimonials::testimonials.form.read_this_description'),
        ]);

        //--------------------------------------------------------------
        //-- Testimonial
        //--------------------------------------------------------------
        $this->add('testimonial_title', 'text', [
            'label' => trans('testimonials::testimonials.form.testimonial_title'),
        ]);

        $this->add('testimonial', 'textarea', [
            'label' => trans('testimonials::testimonials.form.testimonial'),
        ]);

        $this->add('usage_id', 'select', [
            'choices' => TestimonialUsageType::all()->pluck('name', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('testimonials::testimonials.form.usage_id'),
            'empty_value' => trans('core::core.empty_select')
        ]);


        $this->add('published_at', 'dateType', [
            'label' => trans('testimonials::testimonials.form.published_at'),
        ]);

        $this->add('status_id', 'select', [
            'choices' => TestimonialStatusType::all()->pluck('name', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('testimonials::testimonials.form.status_id'),
            'empty_value' => trans('core::core.empty_select')
        ]);

        //--------------------------------------------------------------
        //-- Training
        //--------------------------------------------------------------
        $this->add('tr_personalbenefit', 'textarea', [
            'label' => trans('testimonials::testimonials.form.tr_personalbenefit'),
        ]);

        $this->add('tr_professionalbenefit', 'textarea', [
            'label' => trans('testimonials::testimonials.form.tr_professionalbenefit'),
        ]);

        $this->add('tr_problem', 'textarea', [
            'label' => trans('testimonials::testimonials.form.tr_problem'),
        ]);

        //--------------------------------------------------------------
        //-- Therapy
        //--------------------------------------------------------------
        $this->add('th_goal', 'textarea', [
            'label' => trans('testimonials::testimonials.form.th_goal'),
        ]);

        $this->add('th_lifebefore', 'textarea', [
            'label' => trans('testimonials::testimonials.form.th_lifebefore'),
        ]);

        $this->add('th_lifeafter', 'textarea', [
            'label' => trans('testimonials::testimonials.form.th_lifeafter'),
        ]);

        $this->add('th_evidenceafter', 'textarea', [
            'label' => trans('testimonials::testimonials.form.th_evidenceafter'),
        ]);

        $this->add('th_experience', 'textarea', [
            'label' => trans('testimonials::testimonials.form.th_experience'),
        ]);

        //--------------------------------------------------------------
        //-- Evaluation
        //--------------------------------------------------------------
        $this->add('likedmost', 'textarea', [
            'label' => trans('testimonials::testimonials.form.likedmost'),
        ]);

        $this->add('likedleast', 'textarea', [
            'label' => trans('testimonials::testimonials.form.likedleast'),
        ]);

        $this->add('grade', 'number', [
            'label' => trans('testimonials::testimonials.form.grade'),
        ]);

        $this->add('nps_id', 'select', [
            'choices' => TestimonialNpsType::all()->pluck('name', 'id')->toArray(),
            //'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('testimonials::testimonials.form.nps_id'). trans('testimonials::testimonials.form.nps_id_explain') ,
            'empty_value' => trans('core::core.empty_select')
        ]);

        //--------------------------------------------------------------
        //-- Video
        //--------------------------------------------------------------
        $this->add('testimonial_video', 'text', [
            'label' => trans('testimonials::testimonials.form.testimonial_video'),
        ]);

        $this->add('testimonial_video_comment', 'textarea', [
            'label' => trans('testimonials::testimonials.form.testimonial_video_comment'),
        ]);

        //--------------------------------------------------------------
        //-- Signature
        //--------------------------------------------------------------
        $this->add('sig_name', 'text', [
            'label' => trans('testimonials::testimonials.form.sig_name'),
        ]);

        $this->add('sig_tagline', 'text', [
            'label' => trans('testimonials::testimonials.form.sig_tagline'),
        ]);

        $this->add('vip_id', 'select', [
            'choices' => TestimonialVipType::all()->pluck('name', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('testimonials::testimonials.form.vip_id'),
            'empty_value' => trans('core::core.empty_select')
        ]);

        $this->add('sig_email', 'email', [
            'label' => trans('testimonials::testimonials.form.sig_email'),
        ]);

        $this->add('sig_site', 'url', [
            'label' => trans('testimonials::testimonials.form.sig_site'),
        ]);

        $this->add('sig_profession', 'text', [
            'label' => trans('testimonials::testimonials.form.sig_profession'),
        ]);

        $this->add('sig_country', 'text', [
            'label' => trans('testimonials::testimonials.form.sig_country'),
        ]);

        $this->add('sig_city', 'text', [
            'label' => trans('testimonials::testimonials.form.sig_city'),
        ]);

        $this->add('sig_date', 'dateType', [
            'label' => trans('testimonials::testimonials.form.sig_date'),
        ]);


        $this->add('comment', 'textarea', [
            'label' => trans('testimonials::testimonials.form.comment'),
        ]);


        $this->add('submit', 'submit', [
            'label' => trans('core::core.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);

    }

}
