<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontPagesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/{category}',[FrontPagesController::class, 'category'])->name('News Category');
Route::get('/details/{id}', [FrontPagesController::class, 'categoryDetails'])->name('Details');
Route::get('/contact-us', function () {return view('front.contact_us');});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', [UsersController::class, 'users'])->name('Users');
    Route::get('/section', [SectionController::class, 'section'])->name('Sections');
    Route::get('/category', [CategoryController::class, 'category'])->name('Category');
    Route::get('/news', [NewsController::class, 'news'])->name('All News');
});
