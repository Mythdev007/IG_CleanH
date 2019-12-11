<?php

namespace Modules\Testimonials\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

class TestimonialDictDatabaseSeeder extends SeederHelper
{

    public function dictionary($companyId)
    {

        $npsData = [
            ['id' => '1','name' => 'Not answered', 'company_id' => $companyId],
            ['id' => '10','name' => 'Strongly Disagree', 'company_id' => $companyId],
            ['id' => '20','name' => 'Disagree', 'company_id' => $companyId],
            ['id' => '30','name' => 'Neither', 'company_id' => $companyId],
            ['id' => '40','name' => 'Agree', 'company_id' => $companyId],
            ['id' => '50','name' => 'Strongly Agree', 'company_id' => $companyId],
        ];
        $this->saveOrUpdate('testimonials_dict_nps', $npsData);


        $statusData = [
            ['id' => '1','name' => 'No - need spell checking', 'company_id' => $companyId],
            ['id' => '10','name' => 'Being Corrected', 'company_id' => $companyId],
            ['id' => '100','name' => 'Ready for publishing', 'company_id' => $companyId],
        ];
        $this->saveOrUpdate('testimonials_dict_status', $statusData);

        $usageData = [
            ['id' => '1','name' => 'Not answered', 'company_id' => $companyId],
            ['id' => '10','name' => 'Yes', 'company_id' => $companyId],
            ['id' => '20','name' => 'Only annonymous', 'company_id' => $companyId],
            ['id' => '30','name' => 'No', 'company_id' => $companyId],
        ];
        $this->saveOrUpdate('testimonials_dict_usage', $usageData );

        $vipData = [
            ['id' => '1','name' => 'None', 'company_id' => $companyId],
            ['id' => '100','name' => 'A-Grade International', 'company_id' => $companyId],
            ['id' => '200','name' => 'B-Grade National', 'company_id' => $companyId],
            ['id' => '300','name' => 'C-Grade Profession', 'company_id' => $companyId],
        ];
        $this->saveOrUpdate('testimonials_dict_vip', $vipData );

    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('testimonials_dict_nps')->truncate();
        DB::table('testimonials_dict_status')->truncate();
        DB::table('testimonials_dict_usage')->truncate();
        DB::table('testimonials_dict_vip')->truncate();

        $this->dictionary($this->firstCompany());

    }
}
