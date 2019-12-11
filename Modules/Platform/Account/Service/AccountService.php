<?php
/**
 * Created by PhpStorm.
 * User: laravel-vaance.com
 * Date: 05.01.19
 * Time: 11:30
 */

namespace Modules\Platform\Account\Service;


use Modules\Platform\User\Repositories\UserRepository;

class AccountService
{

    private $userRepo;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    /**
     * Generate User Api Key
     * @param null $userId
     * @return string
     */
    public function generateApiKey($userId = null)
    {

        $key = implode('-', str_split(substr(strtolower(md5(microtime() . rand(1000, 9999))), 0, 30), 6));;

        if (!empty($userId)) {
            $user = $this->userRepo->find($userId);
            $user->api_key = $key;
            $user->save();
        }

        return $key;
    }

}