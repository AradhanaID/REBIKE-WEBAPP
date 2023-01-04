<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/admin', function () {
    return view('admin-page');
});

Route::get('/profile', function () {
    return view('components.profile');
});

Route::get('/editProfile', [App\Http\Controllers\editProfileController::class, 'index']);
Route::post('/updateProfile', [App\Http\Controllers\editProfileController::class, 'update']);

// Forum
Route::get('/forum', [ForumController::class, 'index']);
Route::get('/forum/create', [ForumController::class, 'create'])->middleware('auth');
Route::post('/forum/create', [ForumController::class, 'store'])->middleware('auth');
Route::get('/forum/post/{post:slug}', [ForumController::class, 'show']);
Route::delete('/form/post/{post:slug}', [ForumController::class, 'destroy']);

// Reservation
Route::get('/reservation', [ReservationController::class, 'index']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/store', [App\Http\Controllers\StoreController::class, 'index'])->name('store');
