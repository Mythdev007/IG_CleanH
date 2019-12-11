<?php

namespace Modules\PolizzaCar\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class PianoTariffarioRequest
 * @package Modules\PolizzaCar\Http\Requests
 */
class PianoTariffarioRequest extends Request
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
            'name' => 'min:3|nullable',
            'mm_24' => 'numeric|nullable',
            'mm_36' => 'numeric|nullable',
            'tax_rate' => 'numeric|nullable',
            'commission' => 'numeric|nullable',
            
            
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Valore obbligatorio',
            
        ];
    }
}
