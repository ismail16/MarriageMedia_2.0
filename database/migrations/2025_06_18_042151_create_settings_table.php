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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->longText('value');
            $table->enum('type', [
                'env_settings',
                'client_secret',
                'admin_general',
                'pos',
                'email_smtp',
                'email_template',
                'sms',
                'invoice',
                'barcode',
                'gallery_setting',
                'store_setting',
                'notification_setting',
                'point_setting',
                'membership_setting',
                'email_notify_setting',
                'wallet_setting',
                'is_purchased_setting',
                'firebase_setting',
                'google_setting',
                'app_general',
                'app_login_signup',
                'app_display_setting',
                'app_notification_setting',
                'login_credential',
                'web_theme_setting',
                'website_login_signup',
                'web_setting',
                'website_general',
                'seo',
            ]);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
