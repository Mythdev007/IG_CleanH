<?php

namespace Modules\Platform\User\Repositories;

use Modules\Platform\Core\Repositories\PlatformRepository;
use Modules\Platform\User\Entities\User;

/**
 * Class UserRepository
 * @package Modules\Platform\User\Repositories
 */
class UserRepository extends PlatformRepository
{

    public function model()
    {
        return User::class;
    }

    /**
     * Count users for company
     *
     * @param $company
     * @return mixed
     */
    public function countUsersForCompany($company)
    {

        return $this->findWhere([
            'company_id' => $company->id
        ])->count();

    }

    public function getByApiKey($apiKey)
    {
        return $this->findWhere([
            'api_key' => $apiKey
        ])->first();
    }

}
