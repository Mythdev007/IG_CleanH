<?php

namespace Modules\Platform\Settings\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

/**
 * Class ProvinceSeeder
 * @package Modules\Platform\Settings\Database\Seeders
 */
class ProvinceSeeder extends SeederHelper
{
    private static $countries = [
        ['id' => '1','name' => 'Agrigento','abbr_prov' => 'AG'],
        ['id' => '2','name' => 'Alessandria','abbr_prov' => 'AL'],
        ['id' => '3','name' => 'Ancona','abbr_prov' => 'AN'],
        ['id' => '4','name' => 'Arezzo','abbr_prov' => 'AR'],
        ['id' => '5','name' => 'Ascoli Piceno','abbr_prov' => 'AP'],
        ['id' => '6','name' => 'Asti','abbr_prov' => 'AT'],
        ['id' => '7','name' => 'Avellino','abbr_prov' => 'AV'],
        ['id' => '8','name' => 'Bari','abbr_prov' => 'BA'],
        ['id' => '9','name' => 'Barletta-Andria-Trani','abbr_prov' => 'BT'],
        ['id' => '10','name' => 'Belluno','abbr_prov' => 'BL'],
        ['id' => '11','name' => 'Benevento','abbr_prov' => 'BN'],
        ['id' => '12','name' => 'Bergamo','abbr_prov' => 'BG'],
        ['id' => '13','name' => 'Biella','abbr_prov' => 'BI'],
        ['id' => '14','name' => 'Bologna','abbr_prov' => 'BO'],
        ['id' => '15','name' => 'Bolzano','abbr_prov' => 'BZ'],
        ['id' => '16','name' => 'Brescia','abbr_prov' => 'BS'],
        ['id' => '17','name' => 'Brindisi','abbr_prov' => 'BR'],
        ['id' => '18','name' => 'Cagliari','abbr_prov' => 'CA'],
        ['id' => '19','name' => 'Caltanissetta','abbr_prov' => 'CL'],
        ['id' => '20','name' => 'Campobasso','abbr_prov' => 'CB'],
        ['id' => '21','name' => 'Carbonia-Iglesias','abbr_prov' => 'CI'],
        ['id' => '22','name' => 'Caserta','abbr_prov' => 'CE'],
        ['id' => '23','name' => 'Catania','abbr_prov' => 'CT'],
        ['id' => '24','name' => 'Catanzaro','abbr_prov' => 'CZ'],
        ['id' => '25','name' => 'Chieti','abbr_prov' => 'CH'],
        ['id' => '26','name' => 'Como','abbr_prov' => 'CO'],
        ['id' => '27','name' => 'Cosenza','abbr_prov' => 'CS'],
        ['id' => '28','name' => 'Cremona','abbr_prov' => 'CR'],
        ['id' => '29','name' => 'Crotone','abbr_prov' => 'KR'],
        ['id' => '30','name' => 'Cuneo','abbr_prov' => 'CN'],
        ['id' => '31','name' => 'Enna','abbr_prov' => 'EN'],
        ['id' => '32','name' => 'Fermo','abbr_prov' => 'FM'],
        ['id' => '33','name' => 'Ferrara','abbr_prov' => 'FE'],
        ['id' => '34','name' => 'Firenze','abbr_prov' => 'FI'],
        ['id' => '35','name' => 'Foggia','abbr_prov' => 'FG'],
        ['id' => '36','name' => 'Forlì-Cesena','abbr_prov' => 'FC'],
        ['id' => '37','name' => 'Frosinone','abbr_prov' => 'FR'],
        ['id' => '38','name' => 'Genova','abbr_prov' => 'GE'],
        ['id' => '39','name' => 'Gorizia','abbr_prov' => 'GO'],
        ['id' => '40','name' => 'Grosseto','abbr_prov' => 'GR'],
        ['id' => '41','name' => 'Imperia','abbr_prov' => 'IM'],
        ['id' => '42','name' => 'Isernia','abbr_prov' => 'IS'],
        ['id' => '43','name' => 'La Spezia','abbr_prov' => 'SP'],
        ['id' => '44','name' => 'L\'Aquila','abbr_prov' => 'AQ'],
        ['id' => '45','name' => 'Latina','abbr_prov' => 'LT'],
        ['id' => '46','name' => 'Lecce','abbr_prov' => 'LE'],
        ['id' => '47','name' => 'Lecco','abbr_prov' => 'LC'],
        ['id' => '48','name' => 'Livorno','abbr_prov' => 'LI'],
        ['id' => '49','name' => 'Lodi','abbr_prov' => 'LO'],
        ['id' => '50','name' => 'Lucca','abbr_prov' => 'LU'],
        ['id' => '51','name' => 'Macerata','abbr_prov' => 'MC'],
        ['id' => '52','name' => 'Mantova','abbr_prov' => 'MN'],
        ['id' => '53','name' => 'Massa-Carrara','abbr_prov' => 'MS'],
        ['id' => '54','name' => 'Matera','abbr_prov' => 'MT'],
        ['id' => '55','name' => 'Medio Campidano','abbr_prov' => 'VS'],
        ['id' => '56','name' => 'Messina','abbr_prov' => 'ME'],
        ['id' => '57','name' => 'Milano','abbr_prov' => 'MI'],
        ['id' => '58','name' => 'Modena','abbr_prov' => 'MO'],
        ['id' => '59','name' => 'Monza e della Brianza','abbr_prov' => 'MB'],
        ['id' => '60','name' => 'Napoli','abbr_prov' => 'NA'],
        ['id' => '61','name' => 'Novara','abbr_prov' => 'NO'],
        ['id' => '62','name' => 'Nuoro','abbr_prov' => 'NU'],
        ['id' => '63','name' => 'Ogliastra','abbr_prov' => 'OG'],
        ['id' => '64','name' => 'Olbia-Tempio','abbr_prov' => 'OT'],
        ['id' => '65','name' => 'Oristano','abbr_prov' => 'OR'],
        ['id' => '66','name' => 'Padova','abbr_prov' => 'PD'],
        ['id' => '67','name' => 'Palermo','abbr_prov' => 'PA'],
        ['id' => '68','name' => 'Parma','abbr_prov' => 'PR'],
        ['id' => '69','name' => 'Pavia','abbr_prov' => 'PV'],
        ['id' => '70','name' => 'Perugia','abbr_prov' => 'PG'],
        ['id' => '71','name' => 'Pesaro e Urbino','abbr_prov' => 'PU'],
        ['id' => '72','name' => 'Pescara','abbr_prov' => 'PE'],
        ['id' => '73','name' => 'Piacenza','abbr_prov' => 'PC'],
        ['id' => '74','name' => 'Pisa','abbr_prov' => 'PI'],
        ['id' => '75','name' => 'Pistoia','abbr_prov' => 'PT'],
        ['id' => '76','name' => 'Pordenone','abbr_prov' => 'PN'],
        ['id' => '77','name' => 'Potenza','abbr_prov' => 'PZ'],
        ['id' => '78','name' => 'Prato','abbr_prov' => 'PO'],
        ['id' => '79','name' => 'Ragusa','abbr_prov' => 'RG'],
        ['id' => '80','name' => 'Ravenna','abbr_prov' => 'RA'],
        ['id' => '81','name' => 'Reggio di Calabria','abbr_prov' => 'RC'],
        ['id' => '82','name' => 'Reggio nell\'Emilia','abbr_prov' => 'RE'],
        ['id' => '83','name' => 'Rieti','abbr_prov' => 'RI'],
        ['id' => '84','name' => 'Rimini','abbr_prov' => 'RN'],
        ['id' => '85','name' => 'Roma','abbr_prov' => 'RM'],
        ['id' => '86','name' => 'Rovigo','abbr_prov' => 'RO'],
        ['id' => '87','name' => 'Salerno','abbr_prov' => 'SA'],
        ['id' => '88','name' => 'Sassari','abbr_prov' => 'SS'],
        ['id' => '89','name' => 'Savona','abbr_prov' => 'SV'],
        ['id' => '90','name' => 'Siena','abbr_prov' => 'SI'],
        ['id' => '91','name' => 'Siracusa','abbr_prov' => 'SR'],
        ['id' => '92','name' => 'Sondrio','abbr_prov' => 'SO'],
        ['id' => '93','name' => 'Taranto','abbr_prov' => 'TA'],
        ['id' => '94','name' => 'Teramo','abbr_prov' => 'TE'],
        ['id' => '95','name' => 'Terni','abbr_prov' => 'TR'],
        ['id' => '96','name' => 'Torino','abbr_prov' => 'TO'],
        ['id' => '97','name' => 'Trapani','abbr_prov' => 'TP'],
        ['id' => '98','name' => 'Trento','abbr_prov' => 'TN'],
        ['id' => '99','name' => 'Treviso','abbr_prov' => 'TV'],
        ['id' => '100','name' => 'Trieste','abbr_prov' => 'TS'],
        ['id' => '101','name' => 'Udine','abbr_prov' => 'UD'],
        ['id' => '102','name' => 'Aosta','abbr_prov' => 'AO'],
        ['id' => '103','name' => 'Varese','abbr_prov' => 'VA'],
        ['id' => '104','name' => 'Venezia','abbr_prov' => 'VE'],
        ['id' => '105','name' => 'Verbano-Cusio-Ossola','abbr_prov' => 'VB'],
        ['id' => '106','name' => 'Vercelli','abbr_prov' => 'VC'],
        ['id' => '107','name' => 'Verona','abbr_prov' => 'VR'],
        ['id' => '108','name' => 'Vibo Valentia','abbr_prov' => 'VV'],
        ['id' => '109','name' => 'Vicenza','abbr_prov' => 'VI'],
        ['id' => '110','name' => 'Viterbo','abbr_prov' => 'VT'],
        ['id' => '111','name' => 'Estero','abbr_prov' => 'EE']
    ];
      

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('vaance_province')->truncate();
        $final = [];

        foreach (self::$countries as $country) {
            $country['is_active'] = true;
            $country['created_at'] = Carbon::now();

            $final[] = $country;
        }

        DB::table('vaance_province')->insert($final);

        // $this->saveOrUpdate('vaance_country', self::$countries);
    
    }
}
