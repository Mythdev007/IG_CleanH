<?php
/**
 * Created by PhpStorm.
 * User: jw
 * Date: 20.08.18
 * Time: 15:59
 */

namespace App\Http\Controllers\Auth;


use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Modules\Platform\Companies\Service\CompanyService;
use Modules\Platform\User\Entities\User;

class SocialAuthController extends LoginBaseController
{

    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        if(empty($user->email)){  // No Email protection. Had this error with twitter login
            $user->email = uniqid().'@changeMe.com';
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect('/dashboard');
    }


    /**
     * @param $user
     * @param $provider
     * @return $this|\Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function findOrCreateUser($user, $provider)
    {

        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        }

        if (config('vaance.allow_registration')) {

            $data = [
                'first_name' => !empty($user->name) ? $user->name : 'Change Me',
                'password' => '',
                'email' => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id
            ];

            return $this->companyService->registerCompany($data);

        }

        return redirect()->to('/login');
    }
}
