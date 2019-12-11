<?php

namespace Modules\Contacts\Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ContactEmails\Entities\ContactEmail;
use Modules\Contacts\Entities\Contact;
use Modules\Contacts\Entities\ContactSource;
use Modules\Contacts\Entities\ContactStatus;
use Modules\Contacts\Entities\CustomerLanguage;
use Modules\Platform\Core\Helper\SeederHelper;
use Modules\Platform\Settings\Entities\Country;

class ContactDemoSeederTableSeeder extends SeederHelper
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Contact::truncate();
        ContactEmail::truncate();

        \Auth::attempt(['email' => config('vaance.demo_company_1'), 'password' => config('vaance.demo_company_pass_1')]);

        for ($i = 1; $i <= 50; $i++) {
            $faker = Factory::create();

            $contact = new Contact();
            $contact->id = $i;
            $contact->changeOwnerTo(\Auth::user());
            $contact->first_name = $faker->firstName;
            $contact->last_name = $faker->lastName;
            $contact->email = $faker->safeEmail;
            $contact->job_title = $faker->jobTitle;

            $contact->notes = $faker->sentence();

            $contact->city = $faker->city;
            $contact->street = $faker->streetAddress;
            $contact->country_id = Country::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;
            $contact->zip_code = $faker->postcode;

            $contact->phone = $faker->phoneNumber;
            $contact->mobile = $faker->phoneNumber;

            $contact->contact_status_id = ContactStatus::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;
            $contact->contact_source_id = ContactSource::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;
            $contact->language_id = CustomerLanguage::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;

            $contact->account_id = rand(1, 20);

            $contact->company_id = $this->firstCompany();

            $contact->save();
        }

        \Auth::attempt(['email' => config('vaance.demo_company_2'), 'password' => config('vaance.demo_company_pass_2')]);

        for ($i = 51; $i <= 100; $i++) {
            $faker = Factory::create();

            $contact = new Contact();
            $contact->id = $i;
            $contact->changeOwnerTo(\Auth::user());
            $contact->first_name = $faker->firstName;
            $contact->last_name = $faker->lastName;
            $contact->email = $faker->safeEmail;
            $contact->job_title = $faker->jobTitle;

            $contact->notes = $faker->sentence();

            $contact->city = $faker->city;
            $contact->street = $faker->streetAddress;
            $contact->country_id = Country::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $contact->zip_code = $faker->postcode;

            $contact->phone = $faker->phoneNumber;
            $contact->mobile = $faker->phoneNumber;

            $contact->contact_status_id = ContactStatus::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $contact->contact_source_id = ContactSource::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $contact->language_id = CustomerLanguage::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;

            $contact->account_id = rand(21, 40);

            $contact->company_id = $this->secondCompany();

            $contact->save();
        }
    }
}
