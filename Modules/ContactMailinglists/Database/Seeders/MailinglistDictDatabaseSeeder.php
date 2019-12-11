<?php

namespace Modules\ContactMailinglists\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

class MailinglistDictDatabaseSeeder extends SeederHelper
{

    public function dictionary($companyId)
    {

        $websiteTypeData = [
            ['name' => 'all', 'company_id' => $companyId],
        ];
        $this->saveOrUpdate('mailinglist_dict', $websiteTypeData);

    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mailinglist_dict')->truncate();

        $this->dictionary($this->firstCompany());
        $this->dictionary($this->secondCompany());

    }
}
