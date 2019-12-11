<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolizzaCarProcurementMigrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polizza_car_procurement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_vat')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_cap')->nullable();
            $table->string('company_provincia')->nullable(); 
            $table->integer('country_id')->nullable();
            $table->string('works_type_id')->nullable();
            $table->string('works_type_details')->nullable();
            $table->string('works_duration_dd')->nullable();
            $table->string('works_duration_mm')->nullable();
            $table->string('works_place_city')->nullable();
            $table->string('works_place_pr')->nullable();
            $table->double('procurement_total')->nullable();
            $table->string('insurance_policy')->nullable();
            $table->string('subject_procurement')->nullable();
            $table->string('company_activity')->nullable();
            $table->string('referente_name')->nullable();
            $table->string('referente_email')->nullable();
            $table->string('referente_phone')->nullable();
            $table->string('contract_code')->nullable();
            
            $table->text('works_descr')->nullable();

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
        Schema::dropIfExists('polizza_car_procurement');
    }
}
