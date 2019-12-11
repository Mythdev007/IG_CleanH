<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderStatusAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_dict_status', function (Blueprint $table) {

            $table->string('icon')->nullable();
            $table->string('color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_dict_status', function (Blueprint $table) {

            $table->dropColumn('icon');
            $table->dropColumn('color');
        });
    }
}
