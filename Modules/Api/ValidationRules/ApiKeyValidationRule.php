<?php


namespace Modules\Api\Validators;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\App;
use Modules\Platform\User\Repositories\UserRepository;

class ApiKeyValidationRule implements Rule
{


    public function passes($attribute, $value)
    {

        $userRepo = App::make(UserRepository::class);
        $user = $userRepo->getByApiKey($value);

        return !empty($user);
    }

    public function message()
    {
        return 'The :attribute is invalid';
    }
}
