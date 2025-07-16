<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\AuthController;
use App\Http\Controllers\API\Admin\RoleController;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\Web\UserAuthController;
use App\Http\Controllers\API\Admin\PermissionController;
use App\Http\Controllers\API\Web\CustomerAuthController;
use App\Http\Controllers\API\Admin\RolePermissionController;
use App\Http\Controllers\API\Web\UserController as WebUserController;

Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['prefix' => 'admin', 'middleware' => ('auth:admin-api')], function () {

    Route::post('/token-validate', [AuthController::class, 'tokenValidate']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('user', UserController::class)->names('admin.user');
    Route::resource('role', RoleController::class)->names('admin.role');

    // Route::resource('permission', PermissionController::class)->names('admin.permission');

    // Route::resource('permission', PermissionController::class)->names('admin.permission');

    Route::apiResource('permission', PermissionController::class);


    // Route::get('/permission', [PermissionController::class, 'index']);
    // Route::post('/permission', [PermissionController::class, 'store']);
    // Route::get('/permission/create', [PermissionController::class, 'create']);
    // Route::get('/permission/{id}', [PermissionController::class, 'show']);
    // Route::put('/permission/{id}', [PermissionController::class, 'update']);
    // Route::delete('/permission/{id}', [PermissionController::class, 'destroy']);
    // Route::get('/permission/{id}/edit', [PermissionController::class, 'edit']);


    Route::resource('role-permission', RolePermissionController::class)->names('admin.role-permission');


    // Route::resource('groom-bride', GroomBrideController::class)->names('groom-bride');
});

// Route::post('/user/login', [UserAuthController::class, 'login'])->name('user.login');


Route::group(['middleware' => 'auth:user-api'], function () {

    Route::resource('profile', WebUserController::class)->only(['show', 'update']);

    Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});
