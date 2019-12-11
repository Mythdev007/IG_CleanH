<?php

namespace Modules\Platform\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Krucas\Settings\Facades\Settings;
use Modules\Platform\Core\Helper\CompanySettings;
use Modules\Platform\Core\Helper\SettingsHelper;

/**
 * Class SettingsSeeder
 */
class DisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->seedCompany1();
        // $this->seedCompany2();
    }

    private function seedCompany1(){

        CompanySettings::set(SettingsHelper::S_DISPLAY_SHOW_LOGO_IN_APPLICATION, 1,1);
        CompanySettings::set(SettingsHelper::S_DISPLAY_SHOW_LOGO_IN_PDF, 1,1);
        CompanySettings::set(SettingsHelper::S_DISPLAY_APPLICATION_NAME, 'Strategica Insurance Management',1);
        CompanySettings::set(SettingsHelper::S_DISPLAY_SIDEBAR_BACKGROUND, 'blue.png',1);

        CompanySettings::set(SettingsHelper::S_ANNOUNCEMENT_MESSAGE, '',1);
        CompanySettings::set(SettingsHelper::S_ANNOUNCEMENT_DISPLAY_CLASS, '',1);

        CompanySettings::set(SettingsHelper::S_DISPLAY_LOGO_UPLOAD, 'storage/files/logo/logo__1.png',1);
        CompanySettings::set(SettingsHelper::S_DISPLAY_PDF_LOGO_UPLOAD, 'storage/files/logo/logo_pdf___1.png',1);
        CompanySettings::set(SettingsHelper::S_COMPANY_NAME, 'Strategica Group Srl',1);
        CompanySettings::set(SettingsHelper::S_COMPANY_ADDRESS_, 'Via Leopardi, 7',1);
        CompanySettings::set(SettingsHelper::S_COMPANY_CITY, 'Milano',1);
        CompanySettings::set(SettingsHelper::S_COMPANY_STATE, 'Milano',1);
        CompanySettings::set(SettingsHelper::S_COMPANY_POSTAL_CODE, '20123',1);
        CompanySettings::set(SettingsHelper::S_COMPANY_COUNTRY, 235,1);
        CompanySettings::set(SettingsHelper::S_COMPANY_PHONE, '02.87.280.700',1);
        CompanySettings::set(SettingsHelper::S_COMPANY_FAX, '',1);
        CompanySettings::set(SettingsHelper::S_COMPANY_WEBSITE, 'http://www.strategicagroup.com',1);
        CompanySettings::set(SettingsHelper::S_COMPANY_VAT_ID, '',1);
        
    }

}
