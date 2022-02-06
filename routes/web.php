<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\CustomerQueryController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Frontend Website Route List
|
*/

Route::get('/', [HomeController::class, 'customerLogin'])->name('login');
Route::get('/customer-dashboard', [HomeController::class, 'customerDashboard'])->middleware(['auth', 'verified', 'role:user'])->name('customer-dashboard');


Route::group(['middleware' => ['auth', 'verified', 'role:user']], function () {
    Route::post('user-details', [HomeController::class, 'updateUserDetails'])->name('update_user_details');
    Route::post('update-password', [HomeController::class, 'updatePassword'])->name('update_password');
    Route::post('profile-medias/temp', [HomeController::class, 'uploadProfileMedia'])->name('upload_profile_media_temporary');
    Route::post('profile-medias/remove', [HomeController::class, 'removeProfileMedia'])->name('remove_profile_media_temporary');
    Route::post('profile-medias/upload', [HomeController::class, 'profileMediaUpload'])->name('profile_media_upload');
    Route::resource('queries', CustomerQueryController::class);
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Admin Route List
|
*/
Route::get('/admin/login', [UserController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin/login/post', [UserController::class, 'adminLoginPost'])->name('admin-login-post');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profilePage'])->name('user_frofile');
    Route::post('admin-details', [DashboardController::class, 'updateAdminDetails'])->name('update_admin_details');
    Route::post('update-admin-password', [DashboardController::class, 'updateAdminPassword'])->name('update_admin_password');
    Route::post('admin-profile-medias/temp', [DashboardController::class, 'uploadAdminProfileMedia'])->name('upload_admin_profile_media_temporary');
    Route::post('admin-profile-medias/remove', [DashboardController::class, 'removeAdminProfileMedia'])->name('remove_admin_profile_media_temporary');
    Route::post('admin-profile-medias/upload', [DashboardController::class, 'adminProfileMediaUpload'])->name('admin_profile_media_upload');
    Route::get('customer-queries', [DashboardController::class, 'customerQueries'])->name('customer-queries');
    /**
     * User Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('users', UserController::class)->only(['index', 'show', 'destroy']);
        Route::get('users/verified/view', [UserController::class, 'verified'])->name('users.verified');
        Route::get('users/unverified/view', [UserController::class, 'unverified'])->name('users.unverified');
        Route::put('users/verify/{id}', [UserController::class, 'verify'])->name('users.verify');
        Route::put('users/unverify/{id}', [UserController::class, 'unverify'])->name('users.unverify');
    });

    Route::post('/logout', [UserController::class, 'adminLogout'])->name('admin-logout');
});



require __DIR__ . '/auth.php';
