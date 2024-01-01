<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ImageSliderController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\TextIntroController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\YoutubeController;
use GuzzleHttp\Middleware;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [PostController::class, 'index']);
Route::get('/{lang}', [LocaleController::class, 'index'])->name('language');
// Route::get('/dashboard', [LocaleController::class, 'dashboard'])->name('language');
Route::post('/', [PostController::class, 'store']);
// Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// route::resource('/dashboard', DashboardController::class);
// Route::post('/dashboard', function() {
//     return view('dashboard.index');
// })->name('dashboard')->middleware('auth');
// route::get('/dashboard', [DashboardController::class,'index']);

Route::get('/dashboard/static_text', function() {
    return view('dashboard.static_text.index');
})->middleware('auth');

Route::resource('/dashboard/category', CategoryController::class)->middleware(('auth'));;
Route::resource('/dashboard/blog', BlogController::class)->middleware(('auth'));;
Route::resource('/dashboard/image_slider', ImageSliderController::class)->middleware(('auth'));;
Route::resource('/dashboard/photo_gallery', PhotoGalleryController::class)->middleware(('auth'));;
Route::resource('/dashboard/youtube', YoutubeController::class)->middleware(('auth'));;
Route::resource('/dashboard/static_text/text_intro', TextIntroController::class)->middleware(('auth'));;
Route::resource('/dashboard/jasa', JasaController::class)->middleware(('auth'));;
Route::resource('/dashboard/visi_misi', VisiMisiController::class)->middleware(('auth'));;
Route::resource('/dashboard/partner', PartnerController::class)->middleware(('auth'));
Route::resource('/dashboard/contact_form', ContactFormController::class)->middleware(('auth'));;
Route::resource('/dashboard/profile', ProfileController::class)->middleware(('auth'));;
Route::resource('/dashboard/sosmed', SosmedController::class)->middleware(('auth'));;


// Route::resource('/dashboard/post/imageslider', ImageSliderController::class);

