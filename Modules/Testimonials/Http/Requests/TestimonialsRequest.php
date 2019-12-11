<?php

namespace Modules\Testimonials\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class TestimonialsRequest
 * @package Modules\Testimonials\Http\Requests
 */
class TestimonialsRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'testimonial_title' => 'required',
            'product_id' => 'gt:0',
            'contact_id' => 'gt:0',
        ];
    }

    public function messages()
    {
        return [
            'product_id.gt' => trans('testimonials::testimonials.form.product.error'),
            'contact_id.gt' => trans('testimonials::testimonials.form.contact.error')
        ];
    }

}