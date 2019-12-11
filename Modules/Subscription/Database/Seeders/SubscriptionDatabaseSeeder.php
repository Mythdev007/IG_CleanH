<?php

namespace Modules\Subscription\Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Companies\Entities\CompanyPlan;
use Modules\Platform\Core\Helper\SeederHelper;
use Modules\Platform\User\Entities\User;
use Modules\Subscription\Service\SubscriptionService;

class SubscriptionDatabaseSeeder extends SeederHelper
{


    private function prep()
    {
        $service = App::make(SubscriptionService::class);

        $plan = CompanyPlan::get()->where('id', '<>', 4)->random(1)->first();

        $faker = Factory::create();

        $success = $service->processPayment([
            'plan' => $plan,
            'company' => Company::find($this->firstCompany()),
            'user' => User::find($this->firstCompanyUserId()),
            'provider_name' => array_random([
                'paypal',
                'cash',
                'stripe'
            ]),
            'provider_id' => uniqid(),
            'provider_status' => uniqid(),
            'invoice_date' => $faker->dateTimeBetween(Carbon::now()->subMonth(3))->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

    }
}
