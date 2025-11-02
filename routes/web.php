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
Route::get("/about", aboutController::class);
Route::get("/contact", contactController::class);
Route::get('/job',[jobController::class,'index'] );

Route::resource('blog', postController::class);
Route::resource('tag', tagController::class);
Route::resource('comment', commentController::class);

Route::get('/login', [authController::class,'showLoginForm'] );
Route::get('/signup', [authController::class,'showSignupForm'] );