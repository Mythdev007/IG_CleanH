<?php

namespace Modules\Platform\Settings\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class ProvinceSettingsRequest
 * @package Modules\Platform\Settings\Http\Requests
 */
class ProvinceSettingsRequest extends Request
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
            'abbr_prov' => 'required',
        ];
    }
}
