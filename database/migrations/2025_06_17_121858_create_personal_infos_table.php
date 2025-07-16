<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->text('about_me_family');
            $table->string('education_level');
            $table->string('major_subject');
            $table->string('my_profession');
            $table->string('job_title')->nullable();
            $table->string('job_company_name')->nullable();
            $table->string('income');
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country_of_residence')->nullable();
            $table->string('state_of_residence')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('mother_name');
            $table->string('mother_occupation');
            $table->string('number_of_brother');
            $table->string('how_many_brother_married');
            $table->string('number_of_sister');
            $table->string('how_many_sister_married');
            $table->string('height');
            $table->string('weight');
            $table->string('blood_group');
            $table->string('hair_color');
            $table->string('eye_color');
            $table->string('skin_color');
            $table->string('smoke_status');
            $table->string('alcohol_status');
            $table->string('disabilities_status');
            $table->string('do_u_have_children');
            $table->string('hear_about_us');
            $table->string('diat_status');
            $table->string('mother_tongue');
            $table->string('can_speak')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('personal_infos');
    }
}
