<?php

namespace Modules\Quotes\Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Platform\Core\Helper\SeederHelper;
use Modules\Platform\Settings\Entities\Country;
use Modules\Products\Entities\Product;
use Modules\Quotes\Entities\Quote;
use Modules\Quotes\Entities\QuoteCarrier;
use Modules\Quotes\Entities\QuoteRow;
use Modules\Quotes\Entities\QuoteStage;

class QuoteDemoSeederTableSeeder extends SeederHelper
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Quote::truncate();
        QuoteRow::truncate();

        \Auth::attempt(['email' => config('vaance.demo_company_1'), 'password' => config('vaance.demo_company_pass_1')]);


        for ($i = 1; $i <= 50; $i++) {
            $faker = Factory::create();

            $quote = new Quote();
            $quote->id = $i;
            $quote->changeOwnerTo(\Auth::user());

            $quote->name = 'Quote for ' . $faker->company;
            $quote->amount = rand(1000, 67889);
            $quote->valid_unitl = $faker->dateTimeBetween(Carbon::now()->subMonth(1), Carbon::now()->addMonth(2))->format('Y-m-d H:i:s');

            $quote->notes = $faker->sentence();
            $quote->city = $faker->city;
            $quote->zip_code = $faker->postcode;
            $quote->country_id = Country::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;
            $quote->street = $faker->streetAddress;

            $quote->quote_stage_id = QuoteStage::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;
            $quote->quote_carrier_id = QuoteCarrier::where('company_id',$this->firstCompany())->get()->random(1)->first()->id;


            $quote->account_id = rand(1, 20);

            $quote->company_id = $this->firstCompany();

            $quote->save();

            for ($j = 0; $j <= 3; $j++) {

                $product = Product::find(rand(1,20));

                $row = new QuoteRow();
                $row->quote_id = $quote->id;
                $row->product_name = '#Product ' . $product->name;
                $row->price = $product->price;
                $row->quantity = rand(1, 5);
                $row->company_id = $this->firstCompany();
                $row->product_id = $product->id;

                $row->save();
            }
        }

        \Auth::attempt(['email' => config('vaance.demo_company_2'), 'password' => config('vaance.demo_company_pass_2')]);


        for ($i = 51; $i <= 100; $i++) {
            $faker = Factory::create();

            $quote = new Quote();
            $quote->id = $i;
            $quote->changeOwnerTo(\Auth::user());

            $quote->name = 'Quote for ' . $faker->company;
            $quote->amount = rand(1000, 67889);
            $quote->valid_unitl = $faker->dateTimeBetween(Carbon::now()->subMonth(1), Carbon::now()->addMonth(2))->format('Y-m-d H:i:s');

            $quote->notes = $faker->sentence();
            $quote->city = $faker->city;
            $quote->zip_code = $faker->postcode;
            $quote->country_id = Country::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $quote->street = $faker->streetAddress;

            $quote->quote_stage_id = QuoteStage::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;
            $quote->quote_carrier_id = QuoteCarrier::where('company_id',$this->secondCompany())->get()->random(1)->first()->id;


            $quote->account_id = rand(21, 40);

            $quote->company_id = $this->secondCompany();

            $quote->save();

            for ($j = 0; $j <= 3; $j++) {

                $product = Product::find(rand(21,40));

                $row = new QuoteRow();
                $row->quote_id = $quote->id;
                $row->product_name = '#Product ' . $product->name;
                $row->price = $product->price;
                $row->quantity = rand(1, 5);
                $row->company_id = $this->secondCompany();
                $row->product_id = $product->id;

                $row->save();

                $row->save();
            }
        }
    }
}
