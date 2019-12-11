<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vaance_subscription_invoice', function (Blueprint $table) {

            $table->increments('id');

            $table->string('product_name')->nullable();

            $table->string('invoice_number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->text('invoice_from')->nullable();
            $table->text('invoice_to')->nullable();
            $table->text('terms_and_cond')->nullable();
            $table->text('notes')->nullable();

            $table->float('price')->nullable();
            $table->float('tax_rate')->nullable();
            $table->string('tax_description')->nullable();

            $table->string('currency_name')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('provider_status')->nullable();
            $table->integer('status')->nullable();
            $table->string('plan_name')->nullable();
            $table->string('period')->nullable();

            $table->integer('company_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('vaance_companies', function (Blueprint $table) {
            $table->date('subscription_valid_until')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaance_companies', function (Blueprint $table) {
            $table->dropColumn(['subscription_valid_until']);
        });

        Schema::dropIfExists('vaance_subscription_invoice');
    }
}
