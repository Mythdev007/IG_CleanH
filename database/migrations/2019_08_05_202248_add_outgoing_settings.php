<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOutgoingSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('emails', function (Blueprint $table) {
            $table->integer('campaign_id')->nullable();
            $table->integer('email_campaign_id')->nullable();

        });

        Schema::create('email_campaigns', function (Blueprint $table) {

            $table->increments('id');

            $table->string('subject')->nullable();
            $table->string('from')->nullable();
            $table->text('body')->nullable();

            $table->string('email_host')->nullable();
            $table->string('email_port')->nullable();
            $table->string('email_username')->nullable();
            $table->string('email_password')->nullable();
            $table->string('email_encryption')->nullable();
            $table->string('email_from_address')->nullable();
            $table->string('email_from_name')->nullable();
            $table->boolean('test_mode')->default(1);
            $table->string('email_test')->nullable();

            $table->integer('leads_to_sent')->nullable();
            $table->integer('contacts_to_sent')->nullable();
            $table->integer('accounts_to_sent')->nullable();

            $table->integer('campaign_id')->unsigned()->nullable();
            $table->foreign('campaign_id')->references('id')->on('campaigns');

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

        Schema::table('emails', function (Blueprint $table) {
            $table->dropColumn(['campaign_id','email_campaign_id']);
        });

        Schema::dropIfExists('email_campaigns');
    }
}
