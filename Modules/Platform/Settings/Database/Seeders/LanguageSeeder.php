<?php

namespace Modules\Platform\Settings\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class SettingsLanguageSeeder
 */
class LanguageSeeder extends Seeder
{
    private static $languages = [
        [
            'id' => 1,
            'name' => 'English',
            'language_key' => 'en',
            'is_active' => 1,
        ],
        [
            'id' => 2,
            'name' => 'Italian',
            'language_key' => 'it',
            'is_active' => 1,

        ]   
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaance_language')->truncate();

        $final = [];

        foreach (self::$languages as $languag) {
            $languag['created_at'] = Carbon::now();
            $languag['updated_at'] = Carbon::now();
            
            $final[] = $languag;
        }

        DB::table('vaance_language')->insert($final);

    }
}
