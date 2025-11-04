<?php

use App\Http\Controllers\api\v1\postApiController;
use App\Http\Controllers\api\v1\authApiController;
use App\Http\Controllers\authController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\postController;
use App\Http\Controllers\tagController;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->group(function () {
    Route::apiResource('post', postApiController::class)->middleware('auth:api');

    Route::prefix('auth')->group(function () {
        Route::post('login', [authApiController::class, 'login']);


        route::middleware('auth:api')->group(function () {
            Route::post('refresh', [authApiController::class, 'refresh']);
            Route::get('me', [authApiController::class, 'me']);
            Route::post('logout', [authApiController::class, 'logout']);
        });
    });

});