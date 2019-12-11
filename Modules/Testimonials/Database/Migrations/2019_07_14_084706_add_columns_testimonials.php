<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTestimonials extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonials', function (Blueprint $table) {

            $table->string('testimonial_title')->nullable();
            $table->text('testimonial')->nullable();
            $table->string('testimonial_video')->nullable();
            $table->text('testimonial_video_comment')->nullable();

            $table->text('tr_personalbenefit')->nullable();
            $table->text('tr_professionalbenefit')->nullable();
            $table->text('tr_problem')->nullable();
            $table->text('th_goal')->nullable();
            $table->text('th_lifebefore')->nullable();
            $table->text('th_lifeafter')->nullable();
            $table->text('th_evidenceafter')->nullable();
            $table->text('th_experience')->nullable();
            $table->text('likedmost')->nullable();
            $table->text('likedleast')->nullable();
            $table->integer('grade')->nullable();

            $table->text('tomake10')->nullable();

            $table->integer('NPS')->nullable();
            $table->string('sig_name')->nullable();
            $table->text('sig_tagline')->nullable();

            $table->string('sig_email')->nullable();
            $table->text('sig_site')->nullable();
            $table->text('sig_profession')->nullable();
            $table->string('sig_country')->nullable();

            $table->string('sig_city')->nullable();
            $table->date('sig_date')->nullable();

            $table->date('published_at')->nullable();

            $table->integer('usage_id')->unsigned()->nullable();
            $table->foreign('usage_id')->references('id')->on('testimonials_dict_usage');

            $table->integer('nps_id')->unsigned()->nullable(); //0-5
            $table->foreign('nps_id')->references('id')->on('testimonials_dict_nps');


            $table->integer('vip_id')->unsigned()->nullable();
            $table->foreign('vip_id')->references('id')->on('testimonials_dict_vip');


            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('testimonials_dict_status');

            $table->integer('product_group_id')->unsigned()->nullable();
            $table->foreign('product_group_id')->references('id')->on('products_dict_testimonialgroup');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

