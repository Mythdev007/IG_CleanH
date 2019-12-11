<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('accounts_dict_payment_condition', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name')->nullable();

            $table->integer('numeric_value')->nullable();

            $table->integer('company_id')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });

        Schema::table('accounts', function (Blueprint $table) {

            $table->string('extra_id')->nullable();

            $table->integer('payment_currency_id')->unsigned()->nullable();
            $table->foreign('payment_currency_id')->references('id')->on('vaance_currency');

            $table->integer('payment_condition_id')->unsigned()->nullable();
            $table->foreign('payment_condition_id')->references('id')->on('accounts_dict_payment_condition');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('accounts', function (Blueprint $table) {

            $table->dropColumn('extra_id');

            $table->dropColumn('payment_currency_id');

            $table->dropColumn('payment_condition_id');
        });

        Schema::dropIfExists('accounts_dict_payment_condition');
    }
}
