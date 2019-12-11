<?php

namespace Modules\Calls\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

class CallsDatabaseSeeder extends SeederHelper
{

    public static function directionSeeder($companyId)
    {

        $dictValues = [
            ['name' => 'Incoming', 'company_id' => $companyId],
            ['name' => 'Outgoing', 'company_id' => $companyId],
        ];

        DB::table('calls_dict_direction')->insert($dictValues);
    }

    public static function statusSeeder($companyId)
    {

        $statusValues = [
            ['name' => 'New', 'company_id' => $companyId],
            ['name' => 'Processing', 'company_id' => $companyId],
            ['name' => 'Done', 'company_id' => $companyId],
            ['name' => 'Invalid', 'company_id' => $companyId],
            ['name' => 'Callback', 'company_id' => $companyId],
            ['name' => 'Rejection', 'company_id' => $companyId],
            ['name' => 'Interested', 'company_id' => $companyId],
        ];

        DB::table('calls_dict_status')->insert($statusValues);
    }

    public function dictionary($companyId)
    {
        self::directionSeeder($companyId);
        self::statusSeeder($companyId);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('calls_dict_direction')->truncate();
        DB::table('calls_dict_status')->truncate();

        $this->dictionary($this->firstCompany());
        $this->dictionary($this->secondCompany());
    }
}
