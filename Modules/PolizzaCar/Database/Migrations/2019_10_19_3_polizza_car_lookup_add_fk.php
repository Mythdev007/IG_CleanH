<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolizzaCarLookupAddFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('polizza_car', function (Blueprint $table) {
            $table->integer('procurement_id')->unsigned()->nullable()->change();
            $table->foreign('procurement_id')->references('id')->on('polizza_car_procurement');

            $table->integer('status_id')->unsigned()->nullable()->change();
            $table->foreign('status_id')->references('id')->on('polizza_car_status');

            $table->integer('country_id')->unsigned()->nullable()->change();
            $table->foreign('country_id')->references('id')->on('vaance_country');
            
            $table->integer('risk_id')->unsigned()->nullable()->change();
            $table->foreign('risk_id')->references('id')->on('polizza_car_piano_tariffario');

            $table->integer('works_type_details')->unsigned()->nullable()->change();
            $table->foreign('works_type_details')->references('id')->on('polizza_car_works_type');
            
            
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
