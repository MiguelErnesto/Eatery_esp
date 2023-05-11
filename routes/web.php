<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FrontController;

use App\Http\Controllers\MainsController;
use App\Http\Controllers\NavbarsController;
use App\Http\Controllers\Section1sController;
use App\Http\Controllers\Section2sController;
use App\Http\Controllers\Section3sController;
use App\Http\Controllers\Section3_imgsController;
use App\Http\Controllers\Section3_imgs_social_networksController;
use App\Http\Controllers\Section4sController;
use App\Http\Controllers\Section4_imagesController;
use App\Http\Controllers\Section4_testimonialsController;
use App\Http\Controllers\Section5sController;
use App\Http\Controllers\Section6sController;
use App\Http\Controllers\Section7sController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\Social_networksController;
use App\Http\Controllers\FootersController;
use App\Http\Controllers\Front_previewsController;

use App\Http\Controllers\SendEmailController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name(
    'welcome'
);

Route::post('send_contact_email', [
    App\Http\Controllers\SendEmailController::class,
    'send_contact_email',
])->name('send_contact_email');

Route::post('send_reservation_email', [
    App\Http\Controllers\SendEmailController::class,
    'send_reservation_email',
])->name('send_reservation_email');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    // borrar caché de la aplicación
    Route::get('/admin/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        return 'Application cache cleared';
    });

    Route::get('/admin/home', [
        App\Http\Controllers\HomeController::class,
        'index',
    ])->name('home');

    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index']);

    Route::resource('front', FrontController::class);

    Route::resource('/admin/main', MainsController::class);
    Route::resource('/admin/navbar', NavbarsController::class);
    Route::resource('/admin/section1', Section1sController::class);
    Route::resource('/admin/section2', Section2sController::class);
    Route::resource('/admin/section3', Section3sController::class);
    Route::resource('/admin/section3_imgs', Section3_imgsController::class);
    Route::resource(
        '/admin/section3_imgs_social_networks',
        Section3_imgs_social_networksController::class
    );
    Route::resource('/admin/section4', Section4sController::class);
    Route::resource('/admin/section4_images', Section4_imagesController::class);
    Route::resource(
        '/admin/section4_testimonials',
        Section4_testimonialsController::class
    );
    Route::resource('/admin/section5', Section5sController::class);
    Route::resource('/admin/section6', Section6sController::class);
    Route::resource('/admin/section7', Section7sController::class);
    Route::resource('/admin/reservation', ReservationsController::class);
    Route::resource('/admin/social_network', Social_networksController::class);
    Route::resource('/admin/footer', FootersController::class);
    Route::resource('/admin/front_preview', Front_previewsController::class);

    Route::get('/admin/change-password', [
        App\Http\Controllers\HomeController::class,
        'changePassword',
    ])->name('change-password');
    Route::post('/admin/change-password', [
        App\Http\Controllers\HomeController::class,
        'updatePassword',
    ])->name('update-password');

    Route::get('/admin/change-user', [
        App\Http\Controllers\HomeController::class,
        'changeUser',
    ])->name('change-user');
    Route::post('/admin/change-user', [
        App\Http\Controllers\HomeController::class,
        'updateUser',
    ])->name('update-user');
});
