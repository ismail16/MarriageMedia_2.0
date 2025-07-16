<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('minAge')->nullable();
            $table->string('maxAge')->nullable();
            $table->string('religion')->nullable();
            $table->text('family_status')->nullable();
            $table->text('marital_status')->nullable();
            $table->string('allow_children')->nullable();
            $table->string('minHeight')->nullable();
            $table->string('maxHeight')->nullable();
            $table->string('minWeight')->nullable();
            $table->string('maxWeight')->nullable();
            $table->text('blood_group')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->text('skin_color')->nullable();
            $table->string('disabilities_status');
            $table->text('education_level')->nullable();
            $table->text('subject')->nullable();
            $table->text('profession')->nullable();
            $table->text('country')->nullable();
            $table->text('district')->nullable();
            $table->text('citizenship')->nullable();
            $table->string('smoke_status')->nullable();;
            $table->string('alcohol_status')->nullable();;
            $table->string('diat_status')->nullable();;
            $table->text('language')->nullable();
            $table->string('details_you_prefer')->nullable();
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
        Schema::dropIfExists('preferences');
    }
}
