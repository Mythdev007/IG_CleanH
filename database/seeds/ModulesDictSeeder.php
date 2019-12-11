<?php

use Illuminate\Database\Seeder;

/**
 * Class ModulesSeeder
 */
class ModulesDictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Modules dicts **/

        $this->call( \Modules\PolizzaCar\Database\Seeders\PolizzaCarStatusSeeder::class);
        $this->call( \Modules\PolizzaCar\Database\Seeders\PolizzaCarWorksTypeSeeder::class);

        $this->call( \Modules\PolizzaCar\Database\Seeders\PolizzaCarDemoSeeder::class);

        $this->call( \Modules\PolizzaCar\Database\Seeders\PolizzaCarProcurementSeeder::class);

        $this->call( \Modules\PolizzaCar\Database\Seeders\TariffeSeeder::class);

        $this->call(\Modules\Accounts\Database\Seeders\AccountsDatabaseSeeder::class);
        $this->call(\Modules\Assets\Database\Seeders\AssetsDatabaseSeeder::class);
        $this->call(\Modules\Calendar\Database\Seeders\CalendarDatabaseSeeder::class);
        $this->call(\Modules\Campaigns\Database\Seeders\CampaignsDatabaseSeeder::class);
        $this->call(\Modules\Contacts\Database\Seeders\ContactsDatabaseSeeder::class);
        $this->call(\Modules\Deals\Database\Seeders\DealsDatabaseSeeder::class);
        $this->call(\Modules\Documents\Database\Seeders\DocumentsDatabaseSeeder::class);
        $this->call(\Modules\Invoices\Database\Seeders\InvoicesDatabaseSeeder::class);
        $this->call(\Modules\Leads\Database\Seeders\LeadsDatabaseSeeder::class);
        $this->call(\Modules\Orders\Database\Seeders\OrdersDatabaseSeeder::class);
        $this->call(\Modules\Payments\Database\Seeders\PaymentsDatatableSeeder::class);
        $this->call(\Modules\Products\Database\Seeders\ProductsDatabaseSeeder::class);
        $this->call(\Modules\Quotes\Database\Seeders\QuotesDatabaseSeeder::class);
        $this->call(\Modules\ServiceContracts\Database\Seeders\ServiceContractsDatabaseSeeder::class);
        $this->call(\Modules\Tickets\Database\Seeders\TicketsDatabaseSeeder::class);
        $this->call(\Modules\Vendors\Database\Seeders\VendorsDatabaseSeeder::class);
        $this->call(\Modules\ContactRequests\Database\Seeders\ContactRequestsDatabaseSeeder::class);
        $this->call(\Modules\Calls\Database\Seeders\CallsDatabaseSeeder::class);

        $this->call(\Modules\Testimonials\Database\Seeders\TestimonialDictDatabaseSeeder::class);
        $this->call(\Modules\ContactWebsites\Database\Seeders\WebsiteTypeSeeder::class);

        /** Modules dicts **/
    }
}
