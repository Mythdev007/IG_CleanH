<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompaniesToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $tables = [
            'accounts',
            'assets',
            'vaance_calendar',
            'vaance_calendar_event',
            'campaigns',
            'contacts',
            'deals',
            'documents',
            'invoices',
            'invoices_rows',
            'leads',
            'orders',
            'orders_rows',
            'payments',
            'groups',
            'users',
            'vaance_comment',
            'attachments',
            'products',
            'quotes',
            'quotes_rows',
            'service_contracts',
            'tickets',
            'vendors'
        ];

        foreach ($tables as $record) {
            Schema::table($record, function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->nullable();
                $table->foreign('company_id')->references('id')->on('vaance_companies');
            });
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Cant rollback
    }
}
