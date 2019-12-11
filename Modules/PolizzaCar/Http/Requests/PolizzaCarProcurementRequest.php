<?php

namespace Modules\PolizzaCar\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class PolizzaCarProcurementRequest
 * @package Modules\PolizzaCar\Http\Requests
 */
class PolizzaCarProcurementRequest extends Request
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
            'company_name' => 'min:3|nullable',
            'company_vat' => 'min:11|nullable',
            'company_email' => 'sometimes|nullable|email',
            'company_phone' => 'sometimes|min:3|nullable',
            'company_address' => 'sometimes|min:3|nullable',
            'company_city' => 'sometimes|min:3|nullable',
            'company_cap' => 'sometimes|min:5|nullable',
            'company_provincia' => 'sometimes|min:2|nullable',
            'country_id' => 'sometimes|nullable',
            'subject_procurement' => 'sometimes|nullable',
            'company_activity' => 'sometimes|nullable',
            'referente_name' => 'sometimes|nullable',
            'referente_email' => 'sometimes|nullable',
            'referente_phone' => 'sometimes|nullable',
            'contract_code' => 'sometimes|nullable',
            'works_type_id' => 'sometimes|nullable',
            'works_type_details' => 'sometimes|nullable',
            'works_descr'=> 'sometimes|nullable',
            'works_duration_dd' => 'sometimes|nullable',
            'works_duration_mm' => 'sometimes|nullable',
            'works_place_city' => 'sometimes|nullable',
            'works_place_pr' => 'sometimes|nullable',
            'procurement_total' => 'sometimes|nullable',
            
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
            'company_name.required' => 'Ragione Sociale obbligatorio',
            'company_vat.required' => 'Partita IVA obbligatoria',
            'company_vat.min' => 'Partita IVA non valida'
        ];
    }
}
