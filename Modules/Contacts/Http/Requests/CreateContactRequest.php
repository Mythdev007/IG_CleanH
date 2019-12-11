<?php

namespace Modules\Contacts\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class CreateContactRequest
 * @package Modules\Contacts\Http\Requests
 */
class CreateContactRequest extends Request
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

        $company = session()->get('currentCompany');

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'max:255',
                'sometimes',
                'nullable',
                'email',
                Rule::unique('contacts')->where(function ($query) use ($company) {
                    $query->where('company_id', '=', $company->id);
                    $query->whereNull('deleted_at');

                }),
                Rule::unique('contact_email')->where(function ($query) use ($company) {
                    $query->where('company_id', '=', $company->id);
                    $query->whereNull('deleted_at');
                }),
            ],
            'profile_picture' => 'mimes:jpeg,png'
        ];
    }
}
