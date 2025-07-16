<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('delivery_agents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('avatar')->nullable();
            $table->string('dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('commission')->nullable();
            $table->string('email_address')->nullable();
            $table->string('pin_code');
            $table->boolean('status');
            $table->boolean('availability_status');
            $table->string('address')->nullable();
            $table->string('city_id')->nullable();
            $table->foreignId('state_id')->constrained('states')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('country_id')->constrained('countries')->onUpdate('cascade')->onDelete('cascade');

            $table->string('zip_code')->nullable();
            $table->string('in_active')->nullable();
            $table->string('vehicle_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->string('vehicle_registration_no')->nullable();
            $table->string('vehicle_details')->nullable();
            $table->string('driving_license_no')->nullable();
            $table->string('vehicle_rc_book_no')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('gpay_number')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('sc_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_agents');
    }
};
