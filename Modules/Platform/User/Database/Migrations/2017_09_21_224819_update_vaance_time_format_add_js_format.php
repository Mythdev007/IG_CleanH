<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVaanceTimeFormatAddJsFormat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaance_time_format', function (Blueprint $table) {
            $table->string('js_details')->comment = "Javascript Date Format";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaance_time_format', function (Blueprint $table) {
            $table->dropColumn('js_details');
        });
    }
}
