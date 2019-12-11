<?php

namespace Modules\Api\Traits;

use HipsterJazzbo\Landlord\Facades\Landlord;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Companies\Service\CompanyService;

/**
 * Trait CompanyTrait
 * @package Modules\Api\Traits
 */
trait CompanyTrait
{

    /**
     * Switch Company Context
     *
     * @param $companyId
     * @return null
     */
    public function switchCompany($companyId)
    {

        $companyService = App::make(CompanyService::class);

        if (Auth::user()->hasPermissionTo('settings.access')) {

            $company = $companyService->switchContext($companyId);

            return $company;
        }

        return null;
    }

    /**
     * Check Company Context
     */
    public function checkCompanyContext()
    {



        if (Auth::check()) {

            $user = Auth::user();

            $currentCompany = null;

            $companyConext = session()->get(CompanyService::COMPANY_CONTEXT_SESSION);


            if (!empty($companyConext)) {
                Landlord::addTenant('company_id', $companyConext->id);

                $currentCompany = $companyConext;

            } else if ($user->company != null) {
                Landlord::addTenant('company_id', $user->company->id);

                $currentCompany = $user->company;
            } else {

                $firstCompany = Company::first();

                Landlord::addTenant('company_id', $firstCompany->id);

                $currentCompany = $firstCompany;

            }

            session()->put('currentCompany', $currentCompany);

        }


    }

}