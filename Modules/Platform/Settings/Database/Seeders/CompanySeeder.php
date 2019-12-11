<?php

namespace Modules\Platform\Settings\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Companies\Entities\CompanyPlan;
use Modules\Platform\Core\Helper\CompanySettings;
use Modules\Platform\Core\Helper\SeederHelper;

/**
 * Class CompanySeeder
 * @package Modules\Platform\Settings\Database\Seeders
 */
class CompanySeeder extends SeederHelper
{

    private static $_COMPANIES = [
        [
            'id' => 1,
            'name' => 'Strategica Insurance Management',
            'is_enabled' => 1,
            'description' => 'Insurance Broker',
            'plan_id' => 4,
            'user_limit' => 2,
            'storage_limit' => 1,
        ]
    ];

    private static $_TAXLESS_PLANS = [

        [
            'id' => 4,
            'name' => 'Polizza CAR Plan',
            'description' => "Emissione,controllo e monitoraggio Polizze CAR.",
            'api_name' => 'italgas_plan',
            'is_active' => true,
            'orderby' => 1,
            'currency_id' => 1,
            'price' => '0.00',
            'period' => 'month',
            'is_free' => true,
            'teams_limit' => 2,
            'storage_limit' => 1,
            'color' => '',
            'features_list' => " <ul>
                                                                <li><span>2</span> Users</li>
                                                                <li><span>1GB</span> Storage</li>
                                                                <li><span>Community</span> Support</li>
                                                               
                                                            </ul>"
        ],
        [
            'id' => 1,
            'name' => 'Startup',
            'description' => "We are just starting.",
            'api_name' => 'startup',
            'is_active' => true,
            'featured' => false,
            'orderby' => 2,
            'currency_id' => 1,
            'price' => '39.00',
            'period' => 'month',
            'teams_limit' => 5,
            'storage_limit' => 5,
            'color' => '',
            'features_list' => " <ul>
                                                                <li><span>5</span> Users</li>
                                                                <li><span>5GB</span> Storage</li>
                                                                <li><span>Community</span> Support</li>
                                                                <li><span>Email</span> Support</li>
                                                      
                                                            </ul>"
        ],
        [
            'id' => 2,
            'name' => 'Standard',
            'description' => "For Medium companies with Big Needs",
            'api_name' => 'standard',
            'is_active' => true,
            'featured' => true,
            'orderby' => 3,
            'currency_id' => 1,
            'price' => '99.00',
            'period' => 'month',
            'teams_limit' => 20,
            'storage_limit' => 50,
            'color' => '',
            'features_list' => " <ul>
                                                                <li><span>20</span> Users</li>
                                                                <li><span>50GB</span> Storage</li>
                                                                <li><span>Community</span> Support</li>
                                                                <li><span>Priority Email</span> Support</li>
                                                                 <li><span>Help</span> Center Access</li>
                                                                 
                                                                 </ul>"

        ],
        [
            'id' => 3,
            'name' => 'Premium',
            'description' => "We are gonna rule world.. Someday",
            'api_name' => 'premium',
            'is_active' => true,
            'featured' => false,
            'orderby' => 4,
            'currency_id' => 1,
            'price' => '199.00',
            'period' => 'month',
            'teams_limit' => null,
            'storage_limit' => null,
            'color' => '',
            'features_list' => " <ul>
                                                                <li><span>Unlimited</span> Users</li>
                                                                <li><span>Unlimited</span> Storage</li>
                                                                <li><span>Community</span> Support</li>
                                                                <li><span>Priority Phone, Email</span> Support</li>
                                                                 <li><span>Help</span> Center Access</li>
                                                                 
                                                                 </ul>"
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

        DB::table('vaance_companies_plan')->truncate();
        DB::table('vaance_companies')->truncate();
        DB::table('tags')->truncate();
        DB::table('vaance_subscription_invoice')->truncate();

        $this->saveOrUpdate('vaance_companies_plan', self::$_TAXLESS_PLANS);

        $this->saveOrUpdate('vaance_companies', self::$_COMPANIES);

        /// Seed company specific settings
        foreach (Company::all() as $company){
            CompanySettings::set('s_invoice_prefix','INV-',$company->id);
            CompanySettings::set('s_invoice_increment','1',$company->id);
            CompanySettings::set('s_invoice_use_increment','1',$company->id);
            CompanySettings::set('s_invoice_due_days','7',$company->id);
            CompanySettings::set('s_email_notify_content_welcome',"<p>{{name}},</p><p>Welcome to crm application. You can login here {{app_url}}.</p><p><br></p><p>Your login: {{email}}</p><p>Your password: {{password}}</p><p><br></p><p>Remember to change password after first login!</p><p><br></p><p>regards,<br>Team</p>",$company->id);
        }
        $plans = CompanyPlan::all();

        $permissions = \Spatie\Permission\Models\Permission::all()->where('name', '!=', 'settings.access');

        // For demo purpose attach all permission to all plans.
        foreach ($plans as $plan){

            foreach ($permissions as $permission) {
                $plan->permissions()->attach($permission->id);
            }
        }


    }

}
