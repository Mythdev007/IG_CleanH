<?php

namespace Modules\Subscription\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Platform\Companies\Entities\CompanyPlan;
use Modules\Platform\Companies\Service\CompanyService;
use Modules\Platform\Core\Http\Controllers\AppBaseController;
use Modules\Platform\User\Repositories\UserRepository;
use Modules\Subscription\Service\SubscriptionService;

/**
 * Class SubscriptionBaseController
 * @package Modules\Subscription\Http\Controllers
 */
class SubscriptionBaseController extends AppBaseController
{

    protected $subscriptionService;

    protected $companyService;

    protected $company;

    /**
     * SubscriptionBaseController constructor.
     * @param SubscriptionService $service
     * @param CompanyService $companyService
     */
    public function __construct(SubscriptionService $service, CompanyService $companyService)
    {
        $this->subscriptionService = $service;
        $this->companyService = $companyService;

        parent::__construct();

        \View::share('moduleName', 'subscription');
        \View::share('language_file', 'subscription::subscription');
        \View::share('includeViews', []);

        \View::share('cssFiles', [
            'VAANCE_Subscription.css'
        ]);

        \View::share('jsFiles', [
            'VAANCE_Subscription.js'
        ]);


    }


    /**
     * Validate company plan before purchase
     *
     * @param CompanyPlan $plan
     * @throws \Exception
     */
    public function validateBeforePurchase(CompanyPlan $plan)
    {

        $company = \Auth::user()->companyContext();

        $userRepo = App::make(UserRepository::class);

        $usersCount = $userRepo->countUsersForCompany($company);

        if ($usersCount >= $plan->teams_limit != null && $plan->teams_limit) {
            throw new \Exception('user::users.you_cant_have_more_users', ['planCount' => $company->user_limit, 'currentCount' => $usersCount]);
        }

    }

    /**
     * @param $view
     * @return mixed
     */
    public function setupData(&$view)
    {

        $this->company = \Auth::user()->companyContext();

        $view->with('company', $this->company);
        $view->with('plans', $this->subscriptionService->activePlans());

        return $view;
    }

    /**
     * redirect to board
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('subscription.subscribe');
    }


}
