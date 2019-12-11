<?php

namespace Modules\Products\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class ProductDatesRequest
 * @package Modules\Products\Http\Requests
 */
class ProductDatesRequest extends Request
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
            'product_date' => 'required' ,
        ];
    }
}
