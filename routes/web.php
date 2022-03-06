<?php

use App\Http\Controllers\Admin\TrainingCategoryController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Common\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\UserController as FrontUserController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/how-it-works', [PageController::class, 'howItWorks'])->name('how_it_works');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
// Route::get('/user-dashboard', [FrontUserController::class, 'userDashboard'])->middleware(['auth', 'verified', 'role:user'])->name('user-dashboard');

Route::group(['middleware' => ['auth', 'verified', 'role:user']], function () {
    Route::get('/user-dashboard', [FrontUserController::class, 'userDashboard'])->name('user-dashboard');
    Route::post('/buy-course', [FrontUserController::class, 'buyCourse'])->name('buy_course');
    Route::post('/get-video-url', [FrontUserController::class, 'getVideoUrl'])->name('get_video_url');
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
    Route::post('user-details', [DashboardController::class, 'updateUserDetails'])->name('update_user_details');
    Route::post('update-password', [DashboardController::class, 'updatePassword'])->name('update_password');
    Route::post('profile-medias/temp', [DashboardController::class, 'uploadProfileMedia'])->name('upload_profile_media_temporary');
    Route::post('profile-medias/remove', [DashboardController::class, 'removeProfileMedia'])->name('remove_profile_media_temporary');
    Route::post('profile-medias/upload', [DashboardController::class, 'profileMediaUpload'])->name('profile_media_upload');
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

    /**
     * Training Category Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('training-categories', TrainingCategoryController::class);
    });

    /**
     * Training Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('trainings', TrainingController::class);
    });
    /**
     * Video Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('videos', VideoController::class);
    });

    /**
     * Page routes
     */
    Route::get('home-page', [AdminPageController::class, 'homePage'])->name('home_page');
    Route::post('home-page-post', [AdminPageController::class, 'homePagePost'])->name('home_page_post');
    Route::post('user-details', [DashboardController::class, 'updateUserDetails'])->name('update_user_details');

    Route::post('/logout', [UserController::class, 'adminLogout'])->name('admin-logout');
});



require __DIR__ . '/auth.php';
