<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelRoomController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
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
    Route::get('/hotels/rooms', [HotelRoomController::class, 'index']);
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist', [WishlistController::class, 'store']);
    Route::delete('/wishlist', [WishlistController::class, 'destroy']);
    Route::get('/payment', [PaymentController::class, 'index']);
    Route::post('/payment', [PaymentController::class, 'store']);
    Route::get('/booking', [BookingController::class, 'index']);
    Route::post('/booking', [BookingController::class, 'store']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/getUserByToken', [UserController::class, 'getUserByToken']);
});
