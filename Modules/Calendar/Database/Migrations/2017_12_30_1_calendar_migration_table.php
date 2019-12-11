<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalendarMigrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaance_calendar', function (Blueprint $table) {
            $table->increments('id');


            $table->string('name')->nullable();


            $table->boolean('is_public')->nullable();


            $table->nullableMorphs('owned_by');


            $table->string('default_view')->nullable();


            $table->integer('first_day')->nullable();


            $table->string('day_start_at')->nullable();


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
        Schema::dropIfExists('vaance_calendar');
    }
}
