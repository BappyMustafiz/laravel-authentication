<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Common\DashboardController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TrainingExamController;
use App\Http\Controllers\Admin\TrainingCategoryController;
use App\Http\Controllers\Admin\TrainingExamQuestionController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Front\UserController as FrontUserController;

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
Route::get('/features', [PageController::class, 'features'])->name('features');
Route::get('/product-team', [PageController::class, 'productTeam'])->name('product_team');
Route::get('/design-team', [PageController::class, 'designTeam'])->name('design_team');
Route::get('/agile-team', [PageController::class, 'agileTeam'])->name('agile_team');
Route::get('/faq-page', [PageController::class, 'faq'])->name('faq_page');
Route::get('/support-page', [PageController::class, 'support'])->name('support_page');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/examples', [PageController::class, 'examples'])->name('examples');
// Route::get('/user-dashboard', [FrontUserController::class, 'userDashboard'])->middleware(['auth', 'verified', 'role:user'])->name('user-dashboard');

Route::group(['middleware' => ['auth', 'verified', 'role:user']], function () {
    Route::get('/user-dashboard', [FrontUserController::class, 'userDashboard'])->name('user-dashboard');
    Route::post('/buy-course', [FrontUserController::class, 'buyCourse'])->name('buy_course');
    Route::post('/get-video-url', [FrontUserController::class, 'getVideoUrl'])->name('get_video_url');
    Route::post('/exam-question-submit', [FrontUserController::class, 'examQuestionSubmit'])->name('exam_question_submit');
    Route::get('/user/print/certificate/{result}', [FrontUserController::class, 'printCertificate'])->name('user_print_certificate');
    Route::post('/comment-submit', [FrontUserController::class, 'commentSubmit'])->name('comment_submit');
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

    Route::get('settings', [SettingController::class, 'settingPage'])->name('settings');
    Route::post('logo-medias/temp', [SettingController::class, 'uploadLogoMedia'])->name('upload_logo_media_temporary');
    Route::post('logo-medias/remove', [SettingController::class, 'removeLogoMedia'])->name('remove_logo_media_temporary');
    Route::post('logo-medias/upload', [SettingController::class, 'logoMediaUpload'])->name('logo_media_upload');
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

    //Brands
    Route::group(['prefix' => ''], function () {
        Route::resource('brands', BrandController::class);
    });

    //Blog
    Route::group(['prefix' => ''], function () {
        Route::resource('blog-category', BlogCategoryController::class);
    });

    Route::group(['prefix' => ''], function () {
        Route::resource('blog-post', BlogPostController::class);
    });

    /**
     * Video Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('videos', VideoController::class);
    });

    /**
     * Traing Exam Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('training-exams', TrainingExamController::class);
    });

    /**
     * Traing Exam Question Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('training-exam-question', TrainingExamQuestionController::class);
    });

    /**
     * Page routes
     */
    Route::get('home-page', [AdminPageController::class, 'homePage'])->name('home_page');
    Route::post('home-page-post', [AdminPageController::class, 'homePagePost'])->name('home_page_post');
    Route::get('how-it-work-page', [AdminPageController::class, 'howItWorkPage'])->name('how_it_work_page');
    Route::post('how-it-work-page-post', [AdminPageController::class, 'howItWorkPagePost'])->name('how_it_work_page_post');
    Route::post('user-details', [DashboardController::class, 'updateUserDetails'])->name('update_user_details');

    /**
     * Training Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('testimonials', TestimonialController::class);
    });

    Route::post('/logout', [UserController::class, 'adminLogout'])->name('admin-logout');
});



require __DIR__ . '/auth.php';
