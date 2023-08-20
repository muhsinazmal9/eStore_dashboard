<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* ====================
        FRONTEND
==================== */
Route::get('/', [FrontendController::class, 'welcome']);

// important but idk what this is😒
Auth::routes();


/* ====================
        BACKEND
==================== */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// user profile
Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/edit-profile', [ProfileController::class, 'edit_profile']);
Route::post('/edit-profile/profile_picture/upload', [ProfileController::class, 'profile_picture_upload']);
Route::post('/edit-profile/password/change', [ProfileController::class, 'password_change']);
Route::post('edit-profile/cover_photo/upload', [ProfileController::class, 'cover_photo_upload']);