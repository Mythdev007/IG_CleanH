<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceAddRecurring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('invoices_dict_recurring_period', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('system_name')->nullable();
            $table->integer('company_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('invoices', function (Blueprint $table) {

            $table->string('send_invoice_to')->nullable();

            $table->boolean('is_recurring')->default(0);

            $table->integer('recurring_every')->nullable();

            $table->integer('recurring_period_id')->unsigned()->nullable();

            $table->foreign('recurring_period_id')->references('id')->on('invoices_dict_recurring_period');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('send_invoice_to');
            $table->dropColumn('is_recurring');
            $table->dropColumn('recurring_every');
            $table->dropColumn('recurring_period_id');
        });

        Schema::dropIfExists('invoices_dict_status');

    }
}
