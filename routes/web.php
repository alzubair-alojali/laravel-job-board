<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\job_controller;
use App\Http\Controllers\jobController;
use App\Http\Controllers\postController;
use App\Http\Controllers\tagController;
use Illuminate\Support\Facades\Route;

Route::get("/", [indexController::class,"index"]);
Route::get("/about", [indexController::class,"about"]);
Route::get("/contact", [indexController::class,"contact"]);
Route::get('/job',[jobController::class,'index'] );

Route::get('/blog',[postController::class,'index'] );
Route::get('/blog/create',[postController::class,'create'] );
route::get('/blog/delete',[postController::class,'delete'] );
Route::get('/blog/{id}',[postController::class,'show'] );

Route::get('/comments',[commentController::class,'index'] );
Route::get('/comments/create',[commentController::class,'create'] );

Route::get('tag',[tagController::class,'index'] );
Route::get('tag/create',[tagController::class,'create'] );

Route::get('tag/testmany',[tagController::class,'testmanytomany'] );