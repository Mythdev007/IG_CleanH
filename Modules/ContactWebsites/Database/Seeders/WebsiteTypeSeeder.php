<?php

namespace Modules\ContactWebsites\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

class WebsiteTypeSeeder extends SeederHelper
{

    public function dictionary($companyId)
    {

        $websiteTypeData = [
            ['id' => '1','name' => 'unknown'],
            ['id' => '101','name' => 'website personal'],
            ['id' => '111','name' => 'facebook'],
            ['id' => '121','name' => 'linkedin'],
            ['id' => '131','name' => 'twitter'],
            ['id' => '141','name' => 'instagram'],
            ['id' => '191','name' => 'other'],
            ['id' => '201','name' => 'website business'],
        ];
        $this->saveOrUpdate('vaance_website_dict_types', $websiteTypeData);

    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('vaance_website_dict_types')->truncate();
        $this->dictionary($this->secondCompany());

    }
}
