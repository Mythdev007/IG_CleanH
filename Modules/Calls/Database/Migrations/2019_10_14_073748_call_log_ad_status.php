<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CallLogAdStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('calls_dict_status', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name')->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('vaance_companies');

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::table('calls', function (Blueprint $table) {

            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('calls_dict_status');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calls', function (Blueprint $table) {

            $table->dropColumn('status_id');

        });

    }
}
