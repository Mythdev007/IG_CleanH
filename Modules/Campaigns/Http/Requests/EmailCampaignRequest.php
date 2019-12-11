<?php

namespace Modules\Campaigns\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class EmailCampaignRequest
 * @package Modules\Campaigns\Http\Requests
 */
class EmailCampaignRequest extends Request
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
            'subject' => 'required',
            'body' => 'required',
            'email_from_address' => 'sometimes|nullable|email',
            'email_test' => 'sometimes|nullable|email',

            'email_host' => 'required',
            'email_port' => 'required',
            'email_username' => 'required',
            'email_password' => 'required',
            'email_from_name' => 'required',


        ];
    }

}
