<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/news/{category}', function () {return view('front.category');});
Route::get('/news/{category}/details/{id}', function () {return view('front.category_details');});
Route::get('/contact-us', function () {return view('front.contact_us');});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', [UsersController::class, 'users'])->name('Users');
});
