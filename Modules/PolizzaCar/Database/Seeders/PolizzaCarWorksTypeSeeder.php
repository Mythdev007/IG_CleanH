<?php

namespace Modules\PolizzaCar\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

/**
 * Class PolizzaCarWorksTypeSeeder
 */
class PolizzaCarWorksTypeSeeder extends SeederHelper
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('polizza_car_works_type')->truncate();

        $value = array(
            array('id' => 1,'name' => 'Costruzione di reti e impianti di distribuzione di gas metano di piccole e medie dimensioni'),
            array('id' => 2,'name' => 'Costruzioni e ristrutturazione fabbricati civili e industriali'),
            array('id' => 3,'name' => 'Realizzazione/manutenzione/conduzione impianti tecnologici'),
            array('id' => 4,'name' => 'Realizzazione e manutenzione di sistemi integrati di security'),
            array('id' => 5,'name' => 'Bonifica terreni/corpi idrici + conferimento in discarica/depuratore'),
            array('id' => 6,'name' => 'Altro'),
        );


        $final = [];

        foreach ($value as $complete) {
            $complete['created_at'] = Carbon::now();
            $complete['company_id'] = 1;

            $final[] = $complete;
        }

        DB::table('polizza_car_works_type')->insert($final);
    }
}
