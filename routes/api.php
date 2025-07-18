<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\PhotoPurchaseController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [JWTAuthController::class, 'register']); // No middleware
Route::post('login', [JWTAuthController::class, 'login']); // No middleware

Route::get('/', [NewsController::class, 'index']);
Route::get('/section/{sectionName}', [NewsController::class, 'getBySection']);
Route::get('/category/{category}', [NewsController::class, 'getByCategory']);
Route::get('/details/{id}', [NewsController::class, 'show']);

Route::prefix('photos')->group(function () {
    Route::get('/', [PhotoPurchaseController::class, 'index']);
    Route::get('/{id}', [PhotoPurchaseController::class, 'show']);
});

// Protected routes
Route::middleware(['jwt.auth'])->group(function () {
    Route::get('user', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout']);

    // Photo purchase routes
    Route::prefix('photos')->group(function () {
        Route::post('/{photoId}/purchase', [PhotoPurchaseController::class, 'purchase']);
        Route::get('/{photoId}/download', [PhotoPurchaseController::class, 'download']);
        Route::get('/my-purchases', [PhotoPurchaseController::class, 'myPurchases']);
    });
});
