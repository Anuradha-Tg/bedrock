<?php


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

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ExperienceDetailController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('auth.login');
    // return view('welcome');
});

// Route::get('/', function () {
//     return view('frontend.home');
//     //return view('welcome');
// });






Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/experience-detail', [ExperienceDetailController::class, 'index'])->name('experience-detail');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::post('new-enquiry', [ContactController::class, 'store'])->name('new-enquiry');
Route::get('/room-details/{id}', [RoomController::class, 'RoomDetail'])->name('room-details');
Route::get('gallery', [GalleryController::class, 'index'])->name('gallery');


require __DIR__ . '/auth.php';
