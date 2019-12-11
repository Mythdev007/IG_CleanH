<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Modules\Platform\User\Entities\User;

class LoginController extends LoginBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest')->except('logout');
    }


    public function toLogin()
    {
        return redirect()->to('/login');
    }


    /**
     * Check is user is activated on login
     *
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {

        if (config('vaance.GOOGLE_RECAPTCHA_KEY')) {
            $this->validate($request, [
                'g-recaptcha-response' => 'required|recaptcha'
            ]);
        }

        $this->validate($request, [
            $this->username() => 'required|exists:users,' . $this->username() . ',is_active,1',
            'password' => 'required',
        ], [
            $this->username() . '.exists' => trans('core::core.invalid_login')
        ]);

    }


    /**
     * Register Logged In Activity
     *
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticated(Request $request, User $user)
    {

        if (!$user->isAdmin()) {

            if (!$user->is_active) {
                $this->guard()->logout();
                $request->session()->invalidate();

                return redirect('/login')->withErrors([
                    'email' => trans('core::core.your_account_is_not_active')
                ]);
            }

            if (!$user->company->is_enabled) {
                $this->guard()->logout();
                $request->session()->invalidate();

                return redirect('/login')->withErrors([
                    'email' => trans('core::core.your_company_is_not_active')
                ]);
            }
        }

        activity()
            ->inLog('login-logout')
            ->performedOn($user)->log('LOGGED_IN');
    }

    /**
     * Regiser logged Out
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        activity()
            ->inLog('login-logout')
            ->performedOn(\Auth::user())->log('LOGGED_OUT');

        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
