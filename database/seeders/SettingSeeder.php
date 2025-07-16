<?php

namespace Database\Seeders;

use App\Models\Admin\Customer;
use App\Models\Admin\Purchaser;
use App\Models\Admin\Setting;
use App\Models\Admin\Warehouse;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $customers = Customer::oldest()->first();

        //admin_general setting
        Setting::insertOrIgnore([
            [
                'key' => 'about_us',
                'value' => 'Todays Look Australia is a clothing brand offers more than 100+ International brands at 20%-70% discount, all 365 days a year. We offer customers a wide range of brands and categories at absolutely great prices in an ambience that is refreshingly enjoyable. ',
                'type' => 'admin_general',
            ],
            [
                'key' => 'address',
                'value' => '3 Rosewood Pl Hawker, Australia - 2614',
                'type' => 'admin_general',
            ],
            [
                'key' => 'business_name',
                'value' => "Today's Look Australia",
                'type' => 'admin_general',
            ],
            [
                'key' => 'phone_number',
                'value' => '+0000 000000',
                'type' => 'admin_general',
            ],
            [
                'key' => 'email',
                'value' => 'sales@todayslook.com.au',
                'type' => 'admin_general',
            ],
            [
                'key' => 'new_bage_on_product_card_visibility',
                'value' => 30,
                'type' => 'admin_general',
            ],
            [
                'key' => 'minimum_order_total',
                'value' => 150,
                'type' => 'admin_general',
            ],
            [
                'key' => 'free_shipping_order_price',
                'value' => 299,
                'type' => 'admin_general',
            ]
        ]);

        //Email Smtp Setting
        Setting::insertOrIgnore([
            [
                'key' => 'mail_engine',
                'value' => env('MAIL_MAILER', 'sendgrid'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_host',
                'value' => env('MAIL_HOST', 'smtp.gmail.com'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_port',
                'value' => env('MAIL_PORT', '465'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_encription',
                'value' => env('MAIL_ENCRYPTION', 'tls'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_username',
                'value' => env('MAIL_USERNAME', 'info@example.com'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_password',
                'value' => env('MAIL_PASSWORD', '12345678'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_from_email',
                'value' => env('MAIL_FROM_ADDRESS', 'ecom@example.com'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_from_name',
                'value' => env('MAIL_FROM_NAME', 'Ecom'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_status',
                'value' => 'active',
                'type' => 'email_smtp',
            ],
        ]);

        //sms settings
        Setting::insertOrIgnore([
            [
                'key' => 'gateway',
                'value' => 'twilio',
                'type' => 'sms',
            ],
            [
                'key' => 'twilio_sid',
                'value' => rand(),
                'type' => 'sms',
            ],
            [
                'key' => 'twilio_auth_token',
                'value' => '',
                'type' => 'sms',
            ],
            [
                'key' => 'twilio_number',
                'value' => '12345678',
                'type' => 'sms',
            ],
            [
                'key' => 'firebase_api_key',
                'value' => '12345678',
                'type' => 'sms',
            ],
            [
                'key' => 'firebase_secret_key',
                'value' => '12345678',
                'type' => 'sms',
            ],
        ]);

        //Website General settings
        Setting::insertOrIgnore([
            [
                'key' => 'site_name_or_logo',
                'value' => 'logo',
                'type' => 'website_general',
            ],
            [
                'key' => 'site_name',
                'value' => 'LOGO',
                'type' => 'website_general',
            ],
            [
                'key' => 'site_logo',
                'value' => '/gallery/01-logo.png',
                'type' => 'website_general',
            ],
            [
                'key' => 'favicon',
                'value' => '/gallery/01-fav.png',
                'type' => 'website_general',
            ],
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'google_url',
                'value' => 'https://google.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'about_store',
                'value' => 'About store text will goes here',
                'type' => 'website_general',
            ],
            [
                'key' => 'contect_us_description',
                'value' => 'contact us text will goes here',
                'type' => 'website_general',
            ],
            [
                'key' => 'allow_cookies',
                'value' => true,
                'type' => 'website_general',
            ],
            [
                'key' => 'client_secret',
                'value' => 'sk_1234',
                'type' => 'website_general',
            ],
            [
                'key' => 'client_id',
                'value' => '1234',
                'type' => 'website_general',
            ],
            [
                'key' => 'instagram_embed',
                'value' => 'Instagram Widget',
                'type' => 'website_general',
            ]
        ]);

        //SEO settings
        Setting::insertOrIgnore([
            [
                'key' => 'seo_title',
                'value' => 'abc xyz',
                'type' => 'seo',
            ],
            [
                'key' => 'seo_meta_tags',
                'value' => 'ecommers',
                'type' => 'seo',
            ],
            [
                'key' => 'seo_keywords',
                'value' => 'abc,xyz,ecommerce',
                'type' => 'seo',
            ],
            [
                'key' => 'seo_description',
                'value' => 'bss',
                'type' => 'seo',
            ],
        ]);

        // Webiste sociallite login setting
        Setting::insertOrIgnore([
            [
                'key' => 'facebook_client_id',
                'value' => '',
                'type' => 'login_credential',
            ],
            [
                'key' => 'facebook_client_secret',
                'value' => '',
                'type' => 'login_credential',
            ],
            [
                'key' => 'facebook_redirect',
                'value' => url('/') . '/api/client/customer_login/facebook/callback',
                'type' => 'login_credential',
            ],
            [
                'key' => 'google_client_id',
                'value' => '',
                'type' => 'login_credential',
            ],
            [
                'key' => 'google_client_secret',
                'value' => '',
                'type' => 'login_credential',
            ],
            [
                'key' => 'google_redirect',
                'value' => url('/') . '/api/client/customer_login/google/callback',
                'type' => 'login_credential',
            ],
            [
                'key' => 'sociallite_login',
                'value' => true,
                'type' => 'login_credential',
            ],
        ]);

        //App genral settings
        Setting::insertOrIgnore([
            [
                'key' => 'app_name',
                'value' => 'Ecommerce Solution',
                'type' => 'app_general',
            ],
            [
                'key' => 'category_style',
                'value' => '4',
                'type' => 'app_general',
            ],
            [
                'key' => 'home_style',
                'value' => '4',
                'type' => 'app_general',
            ],
            [
                'key' => 'card_style',
                'value' => '1',
                'type' => 'app_general',
            ],
            [
                'key' => 'banner_style',
                'value' => '1',
                'type' => 'app_general',
            ],
            [
                'key' => 'ios_app_url',
                'value' => 'http://apple.com',
                'type' => 'app_general',
            ],
            [
                'key' => 'google_login',
                'value' => false,
                'type' => 'app_general',
            ],
            [
                'key' => 'facebook_login',
                'value' => false,
                'type' => 'app_general',
            ],
            [
                'key' => 'phone_login',
                'value' => false,
                'type' => 'app_general',
            ],
            [
                'key' => 'email_login',
                'value' => false,
                'type' => 'app_general',
            ],
            [
                'key' => 'inventory',
                'value' => false,
                'type' => 'app_general',
            ],

        ]);


        //admin google_setting setting
        Setting::insertOrIgnore([
            [
                'key' => 'google_map_api_string',
                'value' => '',
                'type' => 'admin_google_setting',
            ]
        ]);

        //google_setting setting
        Setting::insertOrIgnore([
            [
                'key' => 'google_map_api_string',
                'value' => '',
                'type' => 'google_setting',
            ]
        ]);
    }
}
