<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\PhotoPurchaseController;
use App\Http\Controllers\Api\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);

Route::get('/', [NewsController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('/section/{sectionName}', [NewsController::class, 'getBySection']);
Route::get('/category/{category}', [NewsController::class, 'getByCategory']);
Route::get('/details/{id}', [NewsController::class, 'show']);

Route::prefix('photos')->group(function () {
    Route::get('/', [PhotoPurchaseController::class, 'index']);
    Route::get('/show/{id}', [PhotoPurchaseController::class, 'show']);
});

// Protected routes
Route::middleware(['jwt.auth'])->group(function () {
    Route::get('user', [JWTAuthController::class, 'getUser'])->name('api.user');
    Route::post('/logout', [JWTAuthController::class, 'logout'])->name('api.logout');

    // Photo purchase routes
    Route::prefix('photos')->group(function () {
        Route::get('/my-purchase', [PhotoPurchaseController::class, 'myPurchases'])->name('api.photos.purchases');
        Route::post('/{photoId}/purchase', [PhotoPurchaseController::class, 'purchase'])->name('api.photos.purchase');
        Route::get('/{photoId}/download', [PhotoPurchaseController::class, 'download'])->name('api.photos.download');
    });
});

