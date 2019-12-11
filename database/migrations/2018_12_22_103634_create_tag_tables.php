<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTables extends Migration
{
    public function up()
    {

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('tags');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->string('type')->nullable();
            $table->integer('order_column')->nullable();
            $table->integer('company_id')->nullable();
            $table->timestamps();
        });

        Schema::create('taggables', function (Blueprint $table) {
            $table->integer('tag_id')->unsigned();
            $table->integer('taggable_id')->unsigned();
            $table->string('taggable_type');

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('taggables');
        Schema::drop('tags');

        Schema::table('contacts', function (Blueprint $table) {
            $table->text('tags')->nullable();
        });
    }
}
