<?php

namespace Modules\Platform\Companies\Http\Controllers;

use Modules\Platform\Companies\Charts\PackagesChart;
use Modules\Platform\Companies\Charts\PaymentChart;
use Modules\Platform\Companies\Charts\RegisteredChart;
use Modules\Platform\Companies\Charts\SaleChart;
use Modules\Platform\Companies\Service\StatisticsService;
use Modules\Platform\Core\Http\Controllers\AppBaseController;

/**
 * Class StatisticsController
 * @package Modules\Platform\Companies\Http\Controllers
 */
class StatisticsController extends AppBaseController
{

    private $statsService;

    public function __construct(StatisticsService $service)
    {

        $this->statsService = $service;
        parent::__construct();

        \View::share('moduleName', 'subscription');
        \View::share('language_file', 'subscription::subscription');
        \View::share('includeViews', []);

        \View::share('cssFiles', [

        ]);

        \View::share('jsFiles', [

        ]);


    }

    /**
     * redirect to board
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $view = view('companies::statistics');

        $view->with('saleChart', new SaleChart($this->statsService->sale(3)));
        $view->with('registeredChart', new RegisteredChart($this->statsService->registered(3)));
        $view->with('packagesChart', new PackagesChart($this->statsService->packages(3)));
        $view->with('paymentChart', new PaymentChart($this->statsService->paymentType(3)));

        return $view;
    }


}
