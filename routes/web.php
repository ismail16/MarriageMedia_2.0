<?php

use App\Http\Middleware\AuthUser;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\Author\PaymentController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Web\SocialAuthController;
use App\Http\Controllers\API\Web\UserAuthController;
use App\Http\Controllers\Author\BasicInfoController;
use App\Http\Controllers\Author\DashboardController;
use App\Http\Controllers\Author\PreferenceController;
use App\Http\Controllers\Author\ImageAccessController;
use App\Http\Controllers\Author\SentMessageController;
use App\Http\Controllers\Author\PersonalInfoController;
use App\Http\Controllers\Author\SentProposalController;
use App\Http\Controllers\Author\RecieveMessageController;
use App\Http\Controllers\Author\ImageReqReceiveController;
use App\Http\Controllers\Author\ReceiveProposalController;
use App\Http\Controllers\Author\UserProfileImageController;

Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', [PagesController::class, 'index'])->name('index');
    Route::get('/grooms', [PagesController::class, 'grooms'])->name('grooms');
    Route::get('/brides', [PagesController::class, 'brides'])->name('brides');

    Route::get('/login', [PagesController::class, 'login'])->name('login');
    Route::get('/profile/create', [PagesController::class, 'profileCreate'])->name('profile_create');
    Route::get('/about-us', [PagesController::class, 'about_us'])->name('about_us');
    Route::get('/terms-conditions', [PagesController::class, 'terms_conditions'])->name('terms_conditions');
    Route::get('/privacy-policy', [PagesController::class, 'privacy_policy'])->name('privacy_policy');
    Route::get('/contact-us', [PagesController::class, 'contact_us'])->name('contact_us');
    Route::any('/contact-us-post', [PagesController::class, 'contact_us_post'])->name('contact_us_post');
    Route::get('/how-to-use', [PagesController::class, 'how_use'])->name('how_use');
    Route::any('/groom-bride/{id}', [PagesController::class, 'single_groom_bride'])->name('single_groom_bride');
    Route::any('/groom-bride-gallary/{id}', [PagesController::class, 'single_groom_bride_gallary'])->name('single_groom_bride_gallary');

    Route::post('/search-groom-bride', [PagesController::class, 'search_groom_bride'])->name('search_groom_bride');
    Route::get('verifying-user', [PagesController::class, 'verifying_user'])->name('verifying_user');
    // Route::get('setlocale/{locale}', 'LocalizationController@setLocale')->name('setLocale');
});

// Route::get('auth/facebook', [SocialAuthController::class, 'facebookRedirect'])->name('facebook-auth');
// Route::get('auth/facebook/call-back', [SocialAuthController::class, 'callbackFacebook'])->name('facebook-auth-callback');
// Route::get('auth/google', [SocialAuthController::class, 'redirect'])->name('google-auth');
// Route::get('auth/google/call-back', [SocialAuthController::class, 'callbackGoogle'])->name('google-auth-callback');
// Route::get('checkout/google', [SocialAuthController::class, 'googleCheckout'])->name('google-checkout');

//======================================== Author route==================================
Route::post('/user/login', [UserAuthController::class, 'login'])->name('user.login');
Route::middleware([AuthUser::class])->prefix('member')->name('member.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('basic-info', BasicInfoController::class);
    Route::resource('personal-info', PersonalInfoController::class);
    Route::resource('images', UserProfileImageController::class);
    Route::resource('preference', PreferenceController::class);
    Route::resource('sent-message', SentMessageController::class);
    Route::resource('receive-message', RecieveMessageController::class);
    Route::resource('peyment', PaymentController::class);
    Route::resource('image-access', ImageAccessController::class);
    Route::resource('image-request-receive', ImageReqReceiveController::class);
    Route::resource('sent-proposal', SentProposalController::class);
    Route::resource('receive-proposal', ReceiveProposalController::class);
    Route::get('/my-biodata/{id}', [BasicInfoController::class, 'my_biodata'])->name('my_biodata');
    Route::get('/download-biodata/{id}', [BasicInfoController::class, 'downloadBiodata'])->name('downloadBiodata');

    Route::post('/user-logout', [UserAuthController::class, 'userLogout'])->name('userLogout');
});


Route::any('admin/{all}', function () {

    return view('layouts.admin-master');
})->where(['all' => '.*']);
