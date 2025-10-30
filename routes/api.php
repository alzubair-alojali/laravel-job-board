<?php

use App\Http\Controllers\api\postApiController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\postController;
use App\Http\Controllers\tagController;
use Illuminate\Support\Facades\Route;

Route::apiResource('post',postApiController::class);