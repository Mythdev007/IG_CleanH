<?php

namespace Modules\Leads\Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Contacts\Entities\CustomerLanguage;
use Modules\LeadEmails\Entities\LeadEmail;
use Modules\Leads\Entities\Lead;
use Modules\Leads\Entities\LeadIndustry;
use Modules\Leads\Entities\LeadRating;
use Modules\Leads\Entities\LeadSource;
use Modules\Leads\Entities\LeadStatus;
use Modules\Platform\Core\Helper\SeederHelper;
use Modules\Platform\Settings\Entities\Country;
use Modules\Platform\User\Entities\User;

class LeadDemoSeederTableSeeder extends SeederHelper
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Lead::truncate();
        LeadEmail::truncate();

        \Auth::attempt(['email' => config('vaance.demo_company_1'), 'password' => config('vaance.demo_company_pass_1')]);

        for ($i = 1; $i <= 50; $i++) {

            $faker = Factory::create();

            $lead = new Lead();
            $lead->id = $i;
            $lead->changeOwnerTo(\Auth::user());
            $lead->created_at = Carbon::now();
            $lead->capture_date = $faker->dateTimeBetween('-30 Days','now')->format('Y-m-d h:i:s');
            $lead->first_name = $faker->firstName;
            $lead->last_name = $faker->lastName;
            $lead->email = $faker->safeEmail;
            $lead->fax = $faker->phoneNumber;
            $lead->annual_revenue = rand(100000, 300000);
            $lead->website = 'http://'.$faker->domainName;
            $lead->lead_company = $faker->company;
            $lead->job_title = $faker->jobTitle;
            $lead->phone = $faker->phoneNumber;
            $lead->mobile = $faker->phoneNumber;
            $lead->description = $faker->sentence();
            $lead->addr_street = $faker->streetAddress;
            $lead->addr_country_id = Country::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;
            $lead->addr_city = $faker->city;
            $lead->addr_zip = $faker->postcode;

            $lead->lead_status_id = LeadStatus::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;
            $lead->lead_source_id = LeadSource::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;
            $lead->lead_industry_id = LeadIndustry::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;
            $lead->lead_rating_id = LeadRating::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;

            $lead->company_id = $this->firstCompany();
            $lead->language_id = CustomerLanguage::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;

            $lead->campaigns()->attach(rand(1, 20));

            $lead->save();
        }

        \Auth::attempt(['email' => config('vaance.demo_company_2'), 'password' => config('vaance.demo_company_pass_2')]);


        for ($i = 51; $i <= 100; $i++) {

            $faker = Factory::create();

            $lead = new Lead();
            $lead->id = $i;
            $lead->changeOwnerTo(\Auth::user());
            $lead->created_at = Carbon::now();
            $lead->first_name = $faker->firstName;
            $lead->last_name = $faker->lastName;
            $lead->email = $faker->safeEmail;
            $lead->fax = $faker->phoneNumber;
            $lead->annual_revenue = rand(100000, 300000);
            $lead->website = $faker->domainName;
            $lead->lead_company = $faker->company;
            $lead->job_title = $faker->jobTitle;
            $lead->phone = $faker->phoneNumber;
            $lead->mobile = $faker->phoneNumber;
            $lead->description = $faker->sentence();
            $lead->addr_street = $faker->streetAddress;
            $lead->addr_country_id = Country::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $lead->addr_city = $faker->city;
            $lead->addr_zip = $faker->postcode;

            $lead->lead_status_id = LeadStatus::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $lead->lead_source_id = LeadSource::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $lead->lead_industry_id = LeadIndustry::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $lead->lead_rating_id = LeadRating::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;


            $lead->language_id = CustomerLanguage::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $lead->company_id = $this->secondCompany();

            $lead->campaigns()->attach(rand(21, 40));

            $lead->save();
        }
    }
}
