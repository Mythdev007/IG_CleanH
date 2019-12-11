<?php

namespace Modules\PolizzaCar\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

/**
 * Class PolizzaCarStatusSeeder
 */
class PolizzaCarStatusSeeder extends SeederHelper
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('polizza_car_status')->truncate();

        $value = array(
            array('id' => 1,'name' => 'Incompleta', 'image' => '/images/incompleta.svg', 'color' => 'orange', 'icon' => 'more_horiz'),
            array('id' => 2,'name' => 'Attesa Approvazione', 'image' => '/images/elaborazione.svg', 'color' => 'teal', 'icon' => 'how_to_reg'),
            array('id' => 3,'name' => 'Attesa Documenti Firmati', 'image' => '/images/firmare.svg', 'color' => 'deep-orange', 'icon' => 'playlist_add_check'),
            array('id' => 4,'name' => 'Attesa Verifica Documenti', 'image' => '/images/elaborazione.svg', 'color' => 'teal', 'icon' => 'hourglass_empty'),
            array('id' => 5,'name' => 'Elaborazione', 'image' => '/images/cog.svg', 'color' => 'blue', 'icon' => 'compare_arrows'),
            array('id' => 6,'name' => 'Attiva', 'image' => '/images/attiva.svg', 'color' => 'green', 'icon' => 'check'),
            array('id' => 7,'name' => 'Rifiutata', 'image' => '/images/rifiuto.svg', 'color' => 'red', 'icon' => 'block')
        );


        $final = [];

        foreach ($value as $complete) {
            $complete['created_at'] = Carbon::now();
            $complete['company_id'] = 1;

            $final[] = $complete;
        }

        DB::table('polizza_car_status')->insert($final);
    }
}
