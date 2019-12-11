<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('contact_websites', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('type_id')->unsigned()->nullable();

            $table->text('url')->nullable();

            $table->integer('contact_id');

            $table->boolean('is_active');

            $table->boolean('is_default');

            $table->integer('company_id');

            $table->text('notes')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('contact_websites');
    }
}
