<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Common\DashboardController;
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
| Fontend Website Route List
|
*/

Route::get('/', [HomeController::class, 'customerLogin'])->name('login');
Route::get('/customer-dashboard', [HomeController::class, 'customerDashboard'])->middleware(['auth', 'verified', 'role:user'])->name('customer-dashboard');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Admin Route List
|
*/
// Route::get('/admin/login', function () {
//     return view('auth.login');
// })->name('admin.login');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin_verified', 'role:admin']], function () {
//     Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//     Route::get('profile', [DashboardController::class, 'profilePage'])->name('user_frofile');
//     Route::post('user-details', [DashboardController::class, 'updateUserDetails'])->name('update_user_details');
//     Route::post('update-password', [DashboardController::class, 'updatePassword'])->name('update_password');
//     Route::post('profile-medias/temp', [DashboardController::class, 'uploadProfileMedia'])->name('upload_profile_media_temporary');
//     Route::post('profile-medias/remove', [DashboardController::class, 'removeProfileMedia'])->name('remove_profile_media_temporary');
//     Route::post('profile-medias/upload', [DashboardController::class, 'profileMediaUpload'])->name('profile_media_upload');
//     /**
//      * User Management Routes
//      */
//     Route::group(['prefix' => ''], function () {
//         Route::resource('users', UserController::class)->only(['index', 'show', 'destroy']);
//         Route::get('users/verified/view', [UserController::class, 'verified'])->name('users.verified');
//         Route::get('users/unverified/view', [UserController::class, 'unverified'])->name('users.unverified');
//         Route::put('users/verify/{id}', [UserController::class, 'verify'])->name('users.verify');
//         Route::put('users/unverify/{id}', [UserController::class, 'unverify'])->name('users.unverify');
//     });
// });

Route::group(['middleware' => ['auth', 'admin_verified', 'role:user']], function () {
});



require __DIR__ . '/auth.php';
