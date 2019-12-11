<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaance_menu', function (Blueprint $table) {
            $table->boolean('dont_translate')->nullable();
            $table->boolean('visibility')->nullable();
        });
        DB::table('vaance_menu')->update(['visibility' => 1,'dont_translate' => 0]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaance_menu', function (Blueprint $table) {
            $table->dropColumn(['dont_translate','visibility']);
        });
    }
}
