<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Api\Traits\CompanyTrait;
use Modules\Api\Traits\RespondTrait;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Api Auth
 *
 * Class ApiAuthController
 * @package Modules\Api\Http\Controllers
 */
class ApiAuthController extends Controller
{
    use RespondTrait, CompanyTrait;

    public function __construct()
    {
        $this->middleware('jwt.auth')->except('login');
    }


    public function switchCompanyContext(Request $request){

        $companyId = $request->get('company_id',null);

        if(!empty($companyId)){

            return $this->switchCompany($companyId);

        }

    }

    /**
     * Api Login
     *
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->respond(false, [], ['error' => 'invalid_login_or_password'], 'Unauthorized');
        }

        return $this->respond(true, [
            'access_token' => $token,
            'user' => \Auth::user()
        ]);
    }

}
