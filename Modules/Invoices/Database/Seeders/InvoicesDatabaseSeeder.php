<?php

namespace Modules\Invoices\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

class InvoicesDatabaseSeeder extends SeederHelper
{

    public function dictionary($companyId)
    {

        $dictValues = [
            ['name' => 'Created','system_name'=>'created', 'company_id' => $companyId],
            ['name' => 'Cancel','system_name'=>'canceled','company_id' => $companyId],
            ['name' => 'Approved','system_name'=>'approved', 'company_id' => $companyId],
            ['name' => 'Sent','system_name'=>'sent', 'company_id' => $companyId],
            ['name' => 'Paid','system_name'=>'paid', 'company_id' => $companyId],
        ];

        $this->saveOrUpdate('invoices_dict_status', $dictValues);


        $dictValues = [
            ['name' => 'Month','system_name'=>'month', 'company_id' => $companyId],
            ['name' => 'Year','system_name'=>'year','company_id' => $companyId],
            ['name' => 'Day','system_name'=>'day', 'company_id' => $companyId],
        ];

        $this->saveOrUpdate('invoices_dict_recurring_period', $dictValues);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('invoices_dict_status')->truncate();


        $this->dictionary($this->firstCompany());
        $this->dictionary($this->secondCompany());
    }
}
