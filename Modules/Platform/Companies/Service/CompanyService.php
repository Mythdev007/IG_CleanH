<?php

namespace Modules\Platform\Companies\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Modules\Accounts\Database\Seeders\AccountsDatabaseSeeder;
use Modules\Assets\Database\Seeders\AssetsDatabaseSeeder;
use Modules\Calendar\Database\Seeders\CalendarDatabaseSeeder;
use Modules\Calls\Database\Seeders\CallsDatabaseSeeder;
use Modules\Campaigns\Database\Seeders\CampaignsDatabaseSeeder;
use Modules\ContactRequests\Database\Seeders\ContactRequestsDatabaseSeeder;
use Modules\Contacts\Database\Seeders\ContactsDatabaseSeeder;
use Modules\Deals\Database\Seeders\DealsDatabaseSeeder;
use Modules\Documents\Database\Seeders\DocumentsDatabaseSeeder;
use Modules\Invoices\Database\Seeders\InvoicesDatabaseSeeder;
use Modules\Leads\Database\Seeders\LeadsDatabaseSeeder;
use Modules\Orders\Database\Seeders\OrdersDatabaseSeeder;
use Modules\Payments\Database\Seeders\PaymentsDatatableSeeder;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Companies\Entities\CompanyPlan;
use Modules\Platform\Companies\Repositories\CompanyPlansRepository;
use Modules\Platform\Companies\Repositories\CompanyRepository;
use Modules\Platform\Core\Helper\CompanySettings;
use Modules\Platform\Core\Helper\SettingsHelper;
use Modules\Platform\Settings\Database\Seeders\CountrySeeder;
use Modules\Platform\Settings\Database\Seeders\CurrencySeeder;
use Modules\Platform\Settings\Database\Seeders\PermissionsSeeder;
use Modules\Platform\Settings\Database\Seeders\TaxSeeder;
use Modules\ContactMailinglists\Database\Seeders\MailinglistDictDatabaseSeeder;
use Modules\Platform\Settings\Entities\Country;
use Modules\Platform\User\Entities\Role;
use Modules\Platform\User\Entities\User;
use Modules\Platform\User\Repositories\RoleRepository;
use Modules\Products\Database\Seeders\ProductsDatabaseSeeder;
use Modules\Quotes\Database\Seeders\QuotesDatabaseSeeder;
use Modules\ServiceContracts\Database\Seeders\ServiceContractsDatabaseSeeder;
use Modules\Testimonials\Database\Seeders\TestimonialDictDatabaseSeeder;
use Modules\Testimonials\Database\Seeders\TestimonialsDatabaseSeeder;
use Modules\Tickets\Database\Seeders\TicketsDatabaseSeeder;

/**
 * Class CompanyService
 * @package Modules\Platform\Companies\Service
 */
class CompanyService
{

    private $companyRepo;

    private $plansRepo;

    private $roleRepo;

    const COMPANY_CONTEXT_SESSION = 'sessCompanyContext';

    public function __construct(CompanyRepository $repository, CompanyPlansRepository $plansRepo, RoleRepository $roleRepo)
    {
        $this->companyRepo = $repository;
        $this->plansRepo = $plansRepo;
        $this->roleRepo = $roleRepo;
    }

    /**
     * Disable Inactive companies (Companies that didny paid for subscription)
     *
     */
    public function disableInactiveCompanies()
    {

        $companies = Company::whereNotNull('subscription_valid_until')
            ->whereDate('subscription_valid_until', '<', Carbon::now());


        foreach ($companies as $company) {
            $company->is_enabled = false;
            $company->save();
        }

    }

    /**
     * Register Company
     *
     * @param $data
     * @return User
     */
    public function registerCompany($data)
    {

        $plan = $this->plansRepo->findWithoutFail(CompanyPlan::ASSIGN_PLAN_ON_REGISTER);


        $company = new Company();

        if (!empty($plan)) {
            $company->plan()->associate($plan);

            $company->user_limit = $plan->teams_limit;
            $company->storage_limit = $plan->storage_limit;


        }

        $company->name = 'Company ' . uniqid();
        $company->is_enabled = true;


        $company->save();

        //Find Company Manager Role

        $role = $this->roleRepo->getRolebyNameForCompany(Role::DEFAULT_COMPANY_ADMIN_ROLE, $company->id);

        $user = new User($data);
        $user->is_active = true;
        $user->company()->associate($company);
        $user->assignRole($role);
        $user->save();


        return $user;

    }

    /**
     * Seed company with default dictionary data
     * @param Company $company
     */
    public function seedCompany(Company $company)
    {

        // Seed with default dictionary data

        //Roles & Permission
        $permissionSeeder = new PermissionsSeeder();
        $permissionSeeder->dictionary($company->id);

        //Country
        $countrySeeder = new CountrySeeder();
        $countrySeeder->dictionary($company->id);

        //Currency
        $currencySeeder = new CurrencySeeder();
        $currencySeeder->dictionary($company->id);

        //Tax
        $taxSeeder = new TaxSeeder();
        $taxSeeder->dictionary($company->id);

        //Accounts
        $accountSeeder = new AccountsDatabaseSeeder();
        $accountSeeder->dictionary($company->id);

        //Assets
        $assetSeeder = new AssetsDatabaseSeeder();
        $assetSeeder->dictionary($company->id);

        //Calendar
        $calendarSeeder = new CalendarDatabaseSeeder();
        $calendarSeeder->dictionary($company->id);

        //Calls

        //Campaings
        $campaignSeeder = new CampaignsDatabaseSeeder();
        $campaignSeeder->dictionary($company->id);

        //Contacts
        $contactsSeeder = new ContactsDatabaseSeeder();
        $contactsSeeder->dictionary($company->id);

        //Deals
        $dealsSeeder = new DealsDatabaseSeeder();
        $dealsSeeder->dictionary($company->id);

        //Documents
        $documentsSeeder = new DocumentsDatabaseSeeder();
        $documentsSeeder->dictionary($company->id);

        //Invoices
        $invoicesSeeder = new InvoicesDatabaseSeeder();
        $invoicesSeeder->dictionary($company->id);

        //Leads
        $leadsSeeder = new LeadsDatabaseSeeder();
        $leadsSeeder->dictionary($company->id);

        //Orders
        $ordersSeeder = new OrdersDatabaseSeeder();
        $ordersSeeder->dictionary($company->id);

        //Payments
        $paymentSeeder = new PaymentsDatatableSeeder();
        $paymentSeeder->dictionary($company->id);

        //Products
        $productsSeeder = new ProductsDatabaseSeeder();
        $productsSeeder->dictionary($company->id);

        //Quotes
        $quoteSeeder = new QuotesDatabaseSeeder();
        $quoteSeeder->dictionary($company->id);

        //Service Contracts
        $serviceContractSeeder = new ServiceContractsDatabaseSeeder();
        $serviceContractSeeder->dictionary($company->id);

        //Tickets
        $ticketsSeeder = new TicketsDatabaseSeeder();
        $ticketsSeeder->dictionary($company->id);

        //Contact Request
        $contactRequestSeeder = new ContactRequestsDatabaseSeeder();
        $contactRequestSeeder->dictionary($company->id);

        //Calls
        $callsSeeder = new CallsDatabaseSeeder();
        $callsSeeder->dictionary($company->id);

        //Testimonial
        $testimonialSeeder = new TestimonialDictDatabaseSeeder();
        $testimonialSeeder->dictionary($company->id);

        //Mailinglist
        $mailinglistSeeder = new MailinglistDictDatabaseSeeder();
        $mailinglistSeeder ->dictionary($company->id);


        CompanySettings::set('s_invoice_prefix','INV-',$company->id);
        CompanySettings::set('s_invoice_increment','1',$company->id);
        CompanySettings::set('s_invoice_use_increment','1',$company->id);
        CompanySettings::set('s_invoice_due_days','7',$company->id);
        CompanySettings::set('s_email_notify_content_welcome',"<p>&nbsp;{{name}},</p><p>Welcome to MultiCRM. You can login here {{app_url}}.</p><p><br></p><p>Your login: {{email}}</p><p>Your password: {{password}}</p><p><br></p><p>Remember to change password after first login!</p><p><br></p><p>regards,<br>Team</p>",$company->id);
        CompanySettings::set('s_email_notify_content_welcome_title',"Important! You have been invited to MultiCRM");


    }

    /**
     * @return mixed
     */
    public function getCompanies()
    {

        $companies = Cache::remember('all_companies', 2, function () {

            return Company::orderBy('name', 'asc')->where('is_enabled', true)->get();

        });

        return $companies;
    }

    /**
     * Add Company Id to session
     * @param $id
     * @return null
     */
    public function switchContext($id)
    {

        $company = $this->companyRepo->findWithoutFail($id);

        if (!empty($company)) {
            session()->put(self::COMPANY_CONTEXT_SESSION, $company);
            return $company;
        }
    }

    /**
     * Remove company from session
     */
    public function dropContext()
    {
        session()->remove(self::COMPANY_CONTEXT_SESSION);
    }

    /**
     * Get Current Company Data from  Settings
     * @return array
     */
    public function companySettingsData()
    {

        $country_name = '';

        try {
            $country_name = Country::where('id', CompanySettings::get(SettingsHelper::S_COMPANY_COUNTRY))->first()->name;
        } catch (\Exception $e) {

        }

        return [
            'name' => CompanySettings::get(SettingsHelper::S_COMPANY_NAME),
            'address' => CompanySettings::get(SettingsHelper::S_COMPANY_ADDRESS_),
            'city' => CompanySettings::get(SettingsHelper::S_COMPANY_CITY),
            'state' => CompanySettings::get(SettingsHelper::S_COMPANY_STATE),
            'postal_code' => CompanySettings::get(SettingsHelper::S_COMPANY_POSTAL_CODE),
            'country_id' => CompanySettings::get(SettingsHelper::S_COMPANY_COUNTRY),
            'phone' => CompanySettings::get(SettingsHelper::S_COMPANY_PHONE),
            'fax' => CompanySettings::get(SettingsHelper::S_COMPANY_FAX),
            'website' => CompanySettings::get(SettingsHelper::S_COMPANY_WEBSITE),
            'vat_id' => CompanySettings::get(SettingsHelper::S_COMPANY_VAT_ID),
            'country_name' => $country_name
        ];

    }

}
