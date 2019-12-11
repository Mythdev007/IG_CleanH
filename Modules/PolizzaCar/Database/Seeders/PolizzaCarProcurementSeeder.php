<?php

namespace Modules\PolizzaCar\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

/**
 * Class PolizzaCarProcurementSeeder
 */
class PolizzaCarProcurementSeeder extends SeederHelper
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('polizza_car_procurement')->truncate();

        $value = array(
            array(
                'id' => 1,
                'name' => 'Appalto 1',
                'company_name' => 'Appaltatore 1 Srl',
                'company_vat' => '12345678901',
                'company_email' => 'a.vacca@vaance.com',
                'company_phone' => '328 483 427',
                'company_address' => 'Via Leopardi',
                'company_city' => 'city test',
                'company_cap' => '09010',
                'company_provincia' => 'Cagliari',
                'country_id' => 126,
                'subject_procurement' => 'testo libero'
                
            ),
            array(
                'id' => 2,
                'name' => 'Appalto 2',
                'company_name' => 'Appaltatore 2 Spa',
                'company_vat' => '12345678901',
                'company_email' => 'a.forte@vaance.come',
                'company_phone' => '07925 483 427',
                'company_address' => 'Via Milano',
                'company_city' => 'city test',
                'company_cap' => '09020',
                'company_provincia' => 'Milano',
                'country_id' => 126,
                'subject_procurement' => 'testo libero',
            ),
            array(
                'id' => 3,
                'name' => 'Appalto 3',
                'company_name' => 'Appaltatore 3 Snc',
                'company_vat' => '12345678901',
                'company_email' => 'adriano@philosophydesign.com',
                'company_phone' => '07925 483 427',
                'company_address' => 'Via Napoli',
                'company_city' => 'city test',
                'company_cap' => '09020',
                'company_city' => 'city test',
                'company_cap' => '09010',
                'company_provincia' => 'Cagliari',
                'country_id' => 126,
                'subject_procurement' => 'testo libero'
            ),
            array(
                'id' => 4,
                'name' => 'Appalto 4',
                'company_name' => 'Appaltatore 4 Srl',
                'company_vat' => '12345678901',
                'company_email' => 'adriano@avhsoftware.com',
                'company_phone' => '07925 483 427',
                'company_address' => 'Via Testa',
                'company_city' => 'city test',
                'company_cap' => '09020',
                'company_city' => 'city test',
                'company_cap' => '09010',
                'company_provincia' => 'Cagliari',
                'country_id' => 126,
                'subject_procurement' => 'testo libero'
            ),
            array(
                'id' => 5,
                'name' => 'Appalto 5',
                'company_name' => 'Appaltatore 5 Spa',
                'company_vat' => '12345678901',
                'company_email' => 'adriano@adqura.com',
                'company_phone' => '07925 483 427',
                'company_address' => 'Via Tripoli',
                'company_city' => 'city test',
                'company_cap' => '09020',
                'company_city' => 'city test',
                'company_cap' => '09010',
                'company_provincia' => 'Cagliari',
                'country_id' => 126,
                'subject_procurement' => 'testo libero'
            ),
            array(
                'id' => 6,
                'name' => 'Appalto 6',
                'company_name' => 'Appaltatore 6 snc',
                'company_vat' => '12345678901',
                'company_email' => 'boykoasenovminchev@gmail.com',
                'company_phone' => '07925 483 427',
                'company_address' => 'Via Sardegna',
                'company_city' => 'city test',
                'company_cap' => '09020',
                'company_city' => 'city test',
                'company_cap' => '09010',
                'company_provincia' => 'Cagliari',
                'country_id' => 126,
                'subject_procurement' => 'testo libero'
            ),

        );


        $final = [];

        foreach ($value as $complete) {
            $complete['created_at'] = Carbon::now();
            $complete['company_id'] = 1;

            $final[] = $complete;
        }

        DB::table('polizza_car_procurement')->insert($final);
    }
}
