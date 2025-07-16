<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->integer('aid');
            $table->unsignedBigInteger('role_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('marital_status');
            $table->string('profession');
            $table->string('country');
            $table->string('district')->nullable();
            $table->string('birthday');
            $table->string('guardian_mobile')->nullable();
            $table->string('createdby');
            $table->string('religion');
            $table->string('social_order')->nullable();
            $table->string('looking_for');
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('verifyToken')->nullable();
            $table->string('agreement');
            $table->integer('activation')->default(0);
            $table->integer('status')->default(0);

            $table->rememberToken();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('created_by')->references('id')->on('admins');
            $table->foreign('updated_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
