<?php

namespace Modules\Platform\Companies\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateCompanyPlanRequest
 * @package Modules\Platform\Companies\Http\Requests
 */
class UpdateCompanyPlanRequest extends Request
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
            'name' => 'required',
            'api_name' => [
                'required',
                'max:255',
                Rule::unique('vaance_companies_plan')->ignore($this->route('company_plan'))->where(function ($query) {

                })
            ],
        ];
    }
}
