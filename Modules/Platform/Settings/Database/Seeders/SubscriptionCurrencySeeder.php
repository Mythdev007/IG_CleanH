<?php

namespace Modules\Platform\Settings\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

/**
 * Class SettingsTimeFormatSeeder
 */
class SubscriptionCurrencySeeder extends SeederHelper
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('vaance_subscription_currency')->truncate();

        $currencies = array(
            array('id' => 1,'code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$'),
            array('id' => 2, 'code' => 'EUR', 'name' => 'Euro', 'symbol' => '€'),
        );


        $final = [];

        foreach ($currencies as $currency) {
            $currency['created_at'] = Carbon::now();

            $final[] = $currency;
        }

        DB::table('vaance_subscription_currency')->insert($final);
    }
}
