<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\RoomController;
use Illuminate\Support\Facades\Route;

// Menambahkan rute untuk booking
Route::apiResource('booking', BookingController::class);

Route::apiResource('rooms', RoomController::class);

