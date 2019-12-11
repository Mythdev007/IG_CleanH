<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MailinglistDictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('mailinglist_dict', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->text('description')->nullable();

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

        Schema::dropIfExists('mailinglist_dict');
    }
}
