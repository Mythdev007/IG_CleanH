<?php

namespace Modules\Platform\Companies\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class SubscriptionInvoiceRequest
 * @package Modules\Platform\Companies\Http\Requests
 */
class SubscriptionInvoiceRequest extends Request
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

        ];
    }
}
