<?php

use App\Models\Admin\Setting;
use App\Models\DemoSettings;

function getUserName()
{
    return 'Guest';
}

if (!function_exists("getSetting")) {

    function getSetting()
    {
        $settings = Setting::whereNotIn('type', ['app_general', 'app_display_in_setting', 'app_notification_setting', 'app_login_signup'])->get();
        $normalizdSetting = [];
        foreach ($settings as $setting) {
            $normalizdSetting[$setting->key] = $setting->value;
        }

        // $demoSettings = DemoSettings::where('ip', \Request::ip())->first();
        // if ($demoSettings) {
        //     $normalizdSetting['header_style'] = $demoSettings->header_style;
        //     $normalizdSetting['Footer_style'] = $demoSettings->footer_style;
        //     $normalizdSetting['slider_style'] = $demoSettings->slider_style;
        //     $normalizdSetting['banner_style'] = $demoSettings->banner_style;
        //     $normalizdSetting['card_style'] = $demoSettings->cart_style;
        //     $normalizdSetting['product_detail'] = $demoSettings->product_page_style;
        //     $normalizdSetting['shop'] = $demoSettings->shop_style;
        //     $normalizdSetting['color'] = $demoSettings->color;
        // }
        // dd($normalizdSetting);
        return $normalizdSetting;
    }
}
