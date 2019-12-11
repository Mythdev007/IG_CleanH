<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactMailinglistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('contact_mailinglist', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->integer('subscribe_email_id')->unsigned()->nullable();
            $table->integer('mailinglist_id')->unsigned();

            $table->string('subscribe_ip')->nullable();
            $table->string('subscribe_origin_page')->nullable();
            $table->string('subscribe_origin_id')->nullable();
            $table->date('subscribe_date')->nullable();
            $table->date('unsubscribe_date')->nullable();

            $table->integer('company_id')->unsigned();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('subscribe_email_id')->references('id')->on('contact_email');
            $table->foreign('mailinglist_id')->references('id')->on('mailinglist_dict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('contact_mailinglist');
    }
}
