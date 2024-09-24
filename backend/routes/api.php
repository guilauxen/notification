<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/send-message', [NotificationController::class, 'send']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/notifications', [NotificationController::class, 'index']);
