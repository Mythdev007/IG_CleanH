<?php

namespace Modules\ContactWebsites\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class ContactEmailsRequest
 * @package Modules\ContactEmails\Http\Requests
 */
class CreateContactWebsitesRequest extends Request
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
        $id = $this->route()->parameter('contactwebsite');

        $company = session()->get('currentCompany');

        return [
            'url' => [
                'required',
                'url',
            ]
        ];
    }

}
