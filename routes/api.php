<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [UserController::class, 'loginuser']);

Route::apiResource('api-products', ProductController::class)->middleware('auth:sanctum');

//logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');