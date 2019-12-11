<?php

namespace Modules\Platform\Companies\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class SaveSubscriptionSettingsRequest
 * @package Modules\Platform\Companies\Http\Requests
 */
class SaveSubscriptionSettingsRequest extends Request
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
            'invoice_from' => 'required',
        ];
    }
}
