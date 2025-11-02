<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\authController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\postController;
use App\Http\Controllers\tagController;
use Illuminate\Support\Facades\Route;

Route::get("/", indexController::class);

Route::get("/contact", contactController::class);
Route::get('/job', [jobController::class, 'index']);



Route::get('/login', [authController::class, 'showLoginForm']);
Route::get('/signup', [authController::class, 'showSignupForm']);

Route::post('/login', [authController::class, 'login'])->name('login');
Route::post('/signup', [authController::class, 'signup'])->name('signup');
Route::post('/logout', [authController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('blog', postController::class);
    Route::resource('tag', tagController::class);
    Route::resource('comment', commentController::class);
});

Route::middleware(['onlyme'])->group(function () {
    Route::get("/about", aboutController::class);
});