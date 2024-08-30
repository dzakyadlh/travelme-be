<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/fetch', [UserController::class, 'fetch']);
    Route::get('/hotels', [HotelController::class, 'index']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('getUserByToken', [UserController::class, 'getUserByToken']);
});
