<?php

namespace Modules\PolizzaCar\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

/**
 * Class PolizzaCarDemoSeeder
 */
class PolizzaCarDemoSeeder extends SeederHelper
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('polizza_car')->truncate();

        $value = array(
            array(
                'buyer_id' => 3,
                'id' => 1,
                'company_name' => 'Company 1',
                'company_address' => 'Via Toscana',
                'company_email' => 'ukagree@gmail.com',
                'company_phone' => '12321312',
                'company_city' => 'Milano',
                'company_cap' => '09010',
                'company_provincia' => 'MI',
                'company_vat' => '111111111111',
                'country_id' => '122',
                'contract_code' => 'NR-312219',
                'works_type_details' => '2',
                'works_descr' => 'Free text here',
                'works_duration_dd' => '365',
                'works_duration_mm' => '1',
                'works_place_city' => 'MI',
                'works_place_pr' => 'Milano',
                'works_place_region' => '24',
                'car_p1_limit_amount' => '1000',
                'car_p2_limit_amount' => '1000',
                'car_p3_limit_amount' => '1000',
                'status_id' => '2'
            ),
            array(
                'buyer_id' => 3,
                'id' => 2,
                'company_name' => 'Company 2',
                'company_address' => 'Via Toscana',
                'company_email' => 'boykoasenovminchev@gmail.com',
                'company_phone' => '12321312',
                'company_city' => 'Milano',
                'company_cap' => '09010',
                'company_provincia' => 'MI',
                'company_vat' => '0000000000',
                'country_id' => '122',
                'contract_code' => 'NR-318879',
                'works_type_details' => '4',
                'works_descr' => 'Free text here',
                'works_duration_dd' => '365',
                'works_duration_mm' => '1',
                'works_place_city' => 'MI',
                'works_place_pr' => 'Milano',
                'works_place_region' => 'Lombardia',
                'car_p1_limit_amount' => '1000',
                'car_p2_limit_amount' => '1000',
                'car_p3_limit_amount' => '1000',
                'status_id' => '2'
            ),
            array(
                'buyer_id' => 3,
                'id' => 3,
                'company_name' => 'Company 3',
                'company_email' => 'a.vacca@vaance.com',
                'company_phone' => '12321312',
                'company_address' => 'Via Toscana',
                'company_city' => 'Milano',
                'company_cap' => '09010',
                'company_provincia' => 'MI',
                'company_vat' => '0000000000',
                'country_id' => '122',
                'contract_code' => 'NR-312219',
                'works_type_details' => '5',
                'works_descr' => 'Free text here',
                'works_duration_dd' => '365',
                'works_duration_mm' => '1',
                'works_place_city' => 'MI',
                'works_place_pr' => 'Milano',
                'works_place_region' => '24',
                'car_p1_limit_amount' => '1000',
                'car_p2_limit_amount' => '1000',
                'car_p3_limit_amount' => '1000',
                'status_id' => '2'
            ),
        );


        $final = [];

        foreach ($value as $complete) {
            $complete['date_request'] = Carbon::yesterday();
            $complete['created_at'] = Carbon::yesterday();

            $final[] = $complete;
        }

        DB::table('polizza_car')->insert($final);
    }
}
