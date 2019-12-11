<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Accounts\Database\Seeders\AccountsDatabaseSeeder;
use Modules\Accounts\Entities\AccountPaymentCondition;
use Modules\Calls\Database\Seeders\CallsDatabaseSeeder;
use Modules\Calls\Entities\CallStatus;
use Modules\Platform\Companies\Entities\Company;

class VaanceUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaance:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update application data after new version release';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate', ['--force' => true]);

        $this->info('Update 3.1');

        $this->accountsModule();

        $this->info('Update 3.1.3 ');
    }

    private function accountsModule()
    {

        $this->info('Updating accounts module');

        $accountDictSeeder = new AccountsDatabaseSeeder();

        $companies = Company::all();

        foreach ($companies as $company) {

            $count = AccountPaymentCondition::where('company_id', $company->id)->count();

            if ($count == 0) {
                $this->info($company->name . ' Seeding account payment condition database');

                $accountDictSeeder->paymentConditionSeeder($company->id);
            }
        }
    }

    private function callsModule()
    {
        $this->info('Updating calls module');

        $companies = Company::all();
        foreach ($companies as $company) {
            $count = CallStatus::where('company_id', $company->id)->count();
            if ($count == 0) {
                $this->info($company->name . ' Seeding call status database');

                CallsDatabaseSeeder::statusSeeder($company->id);
            }
        }
    }
}
