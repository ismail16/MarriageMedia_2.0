<?php

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Admin\Profession;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\AuthController;
use App\Http\Controllers\API\Admin\RoleController;
use App\Http\Controllers\API\Web\UserAuthController;
use App\Http\Controllers\API\Admin\DistrictController;
use App\Http\Controllers\API\Admin\AdminUserController;
use App\Http\Controllers\API\Admin\GroomBrideController;
use App\Http\Controllers\API\Admin\PermissionController;
use App\Http\Controllers\API\Admin\ProfessionController;
use App\Http\Controllers\API\Web\CustomerAuthController;
use App\Http\Controllers\API\Admin\RolePermissionController;
use App\Http\Controllers\API\Web\UserController as WebUserController;

Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::resource('profession', ProfessionController::class);
Route::resource('district', DistrictController::class);


Route::group(['prefix' => 'admin', 'middleware' => ('auth:admin-api')], function () {

    Route::post('/token-validate', [AuthController::class, 'tokenValidate']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('admin-user', AdminUserController::class)->names('admin.user');
    Route::resource('role', RoleController::class)->names('admin.role');

    // Route::resource('permission', PermissionController::class)->names('admin.permission');
    // Route::resource('permission', PermissionController::class)->names('admin.permission');

    Route::apiResource('permission', PermissionController::class);
    Route::resource('role-permission', RolePermissionController::class)->names('admin.role-permission');

    Route::resource('groom-bride', GroomBrideController::class)->names('groom-bride');
});

// Route::post('/user/login', [UserAuthController::class, 'login'])->name('user.login');


Route::group(['middleware' => 'auth:user-api'], function () {

    Route::resource('profile', WebUserController::class)->only(['show', 'update']);

    Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});
