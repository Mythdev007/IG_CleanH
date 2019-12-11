<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductAddCurrency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('vaance_currency');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn('currency_id');

        });

    }
}
