<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\PostController;



Route::group(['middleware' => 'auth:api'], function () {

    Route::group(['prefix' => 'message'], function () {
        Route::get('/', [MessageController::class, 'index']);
        Route::get('/{id}', [MessageController::class, 'show'])->where('id', '[0-9]+');
        Route::put('/{id}', [MessageController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('/{id}', [MessageController::class, 'destroy'])->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::put('/{id}', [MessageController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('/{id}', [MessageController::class, 'destroy'])->where('id', '[0-9]+');
        Route::post('/', [PostController::class, 'store']);
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::get('/', [AuthController::class, 'me']);
        Route::post('/signup', [AuthController::class, 'signup']);
        Route::post('/change-password', [AuthController::class, 'changePassword']);
    });
    
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/signin', [AuthController::class, 'signin']);
});


Route::post('/message', [MessageController::class, 'store']);

Route::group(['prefix' => 'post'], function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{id}', [PostController::class, 'show'])->where('id', '[0-9]+');
});
