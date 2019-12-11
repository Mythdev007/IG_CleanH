<?php

namespace Modules\ContactWebsites\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;
use Modules\ContactWebsites\Entities\ContactWebsite;

/**
 * Class ContactEmailsRequest
 * @package Modules\ContactEmails\Http\Requests
 */
class UpdateContactWebsitesRequest extends Request
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

        $contactEmail = ContactWebsite::findOrFail($id);

        return [
            'url' => [
                'required',
                'url',
            ]
        ];
    }

}
