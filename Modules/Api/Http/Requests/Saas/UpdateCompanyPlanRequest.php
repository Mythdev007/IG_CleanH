<?php

namespace Modules\Api\Http\Requests\Saas;

use App\Http\Requests\Request;

/**
 * Update Company Plan
 *
 * Class UpdateCompanyPlanRequest
 * @package Modules\Api\Http\Requests\Saas
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
            'api_secret' => 'required',
            'company_id' => 'required',
        ];
    }
}
