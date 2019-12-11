<?php
/**
 * Created by PhpStorm.
 * User: jw
 * Date: 15.11.18
 * Time: 10:50
 */

namespace Modules\Api\Http\Controllers\Base;

use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Modules\Api\Validators\ApiKeyValidationRule;
use Modules\Platform\User\Repositories\UserRepository;


/**
 * Simple webform create controller
 *
 * Allows to skip jwt authentication and use simple post
 *
 * Class WebFormBaseController
 * @package Modules\Api\Http\Controllers\Base
 */
class WebFormBaseController extends CrudApiController
{

    protected $skipAuth = true;

    protected function getUser()
    {

        $apiKey = request()->get('api_key');

        $userRepo = App::make(UserRepository::class);
        $user = $userRepo->getByApiKey($apiKey);

        return $user;
    }

    protected function authValidation()
    {
        request()->validate([
            'api_key' => ['required', new ApiKeyValidationRule()]
        ]);

        $user = $this->getUser();

        if ($user->isAdmin() && request()->get('company_id', null) == null) {
            $error = ValidationException::withMessages([
                "company_id" => "You are administrator. 'company_id' is required."
            ]);
            throw  $error;
        } else if (!$user->isAdmin()) {
            request()->request->set('company_id', $user->company->id);
        }

        request()->request->remove('api_key');
    }

    public function authTest(){

        $this->authValidation();

        return $this->respond(true,[
            'result' => 'Valid authentication'
        ]);

    }

    /**
     * Overrided function to get company context
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {

        $this->authValidation();

        return parent::store();
    }


}
