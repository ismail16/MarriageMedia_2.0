<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfileImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile_images', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->integer('profile_image')->default(0);
            $table->string('image');
            $table->text('image_slug');
            $table->text('show_request_ids')->nullable();
            $table->text('show_approved_ids')->nullable();
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
        Schema::dropIfExists('user_profile_images');
    }
}
