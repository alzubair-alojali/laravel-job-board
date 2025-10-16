<?php

use App\Http\Controllers\job_controller;
use App\Http\Controllers\jobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/job',[jobController::class,'index'] );
