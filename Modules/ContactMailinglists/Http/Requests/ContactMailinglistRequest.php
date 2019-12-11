<?php

namespace Modules\ContactMailinglists\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class ContactEmailsRequest
 * @package Modules\ContactEmails\Http\Requests
 */
class ContactMailinglistRequest extends Request
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
        $id = $this->route()->parameter('contactmailinglist');

        $company = session()->get('currentCompany');

        return [
            'mailinglist_id' => [
                'required',
                Rule::unique('contact_mailinglist')->ignore($id)->where(function ($query) use ($company) {
                    $query->where('company_id', '=', $company->id);
                }),
            ],
            'subscribe_email_id' => [
                'required',
            ]
        ];
    }

}
