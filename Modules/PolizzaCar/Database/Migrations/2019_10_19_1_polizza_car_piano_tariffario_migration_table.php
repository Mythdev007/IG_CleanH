<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolizzaCarPianoTariffarioMigrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polizza_car_piano_tariffario', function (Blueprint $table) {
            $table->increments('id');


            $table->string('name')->nullable();
            $table->float('mm_24')->nullable();
            $table->float('mm_36')->nullable();
            $table->float('tax_rate')->nullable();
            $table->float('commission')->nullable();
            $table->double('car_p1_limit')->nullable();
            $table->double('car_p2_limit')->nullable();
            $table->double('car_p3_limit')->nullable();
            
            $table->integer('company_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polizza_car_piano_tariffario');
    }
}
