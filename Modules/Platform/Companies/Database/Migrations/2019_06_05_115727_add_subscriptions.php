<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaance_companies_plan', function (Blueprint $table) {

            $table->boolean('is_active')->default(1);

            $table->string('color')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('is_free')->default(0);

            $table->float('price')->nullable();
            $table->string('period')->nullable();
            $table->float('tax_rate')->nullable();
            $table->string('tax_name')->nullable();

            $table->text('features_list')->nullable();

            $table->integer('teams_limit')->nullable();
            $table->integer('storage_limit')->nullable();

            $table->integer('orderby')->default(0);

            $table->integer('plan_type')->default(1);

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

        $cols = [
            'is_active','color','featured','price','teams_limit',
            'storage_limit','orderby','currency_id','tax_rate','tax_name'
        ];

        Schema::table('vaance_companies_plan', function (Blueprint $table) use ($cols) {

            $table->dropColumn($cols);

        });
    }
}
