<?php

use App\Http\Controllers\AdvertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontPagesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\PhotoSaleController;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;
use App\Http\Controllers\Auth\CustomRegisteredUserController;
use App\Helpers\DownloadHelper;
use App\Models\PhotosOnSell;
use App\Http\Controllers\GalleryController;


Route::get('/', function () {
    return view('welcome');
});


Route::post('/login', [CustomAuthenticatedSessionController::class, 'login'])->name('login');

Route::post('/register', [CustomRegisteredUserController::class, 'register'])->name('register');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/users', [UsersController::class, 'users'])->name('Users');
    Route::get('/section', [SectionController::class, 'section'])->name('Sections');
    Route::get('/category', [CategoryController::class, 'category'])->name('Category');
    Route::get('/news', [NewsController::class, 'news'])->name('All News');
    Route::get('/adverts', [AdvertController::class, 'adverts'])->name('All Adverts');
    Route::get('/photos-to-sell', [PhotoSaleController::class, 'photos'])->name('Photos');
    Route::get('/gallery', [GalleryController::class, 'galleryPhotos'])->name('Gallery');
});

Route::group(['middleware' => ['auth', \App\Http\Middleware\EnsureUserIsBuyer::class]], function () {
    Route::get('/checkout/{photo}', [PhotoSaleController::class, 'checkout'])->name('photo.checkout')->middleware('signed');
    Route::get('/photo/{photo}', [PhotoSaleController::class, 'photoDetails'])->name('photo.details')->middleware('signed');
    Route::get('/download-photo/{photo}', function (PhotosOnSell $photo) {
        // Middleware already verifies the signature
        return DownloadHelper::downloadFile($photo);
    })->name('photo.download')->middleware(['auth', 'signed']);
});



Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/details/{id}', [FrontPagesController::class, 'categoryDetails'])->name('Details');
Route::get('/more-details/{id}', [FrontPagesController::class, 'moreDetails'])->name('More Details');
Route::get('/contact-us', function () {return view('front.contact_us');});
Route::get('/more-photos', [PhotoSaleController::class, 'morePhotos'])->name('More Photos');

Route::get('/{category}',[FrontPagesController::class, 'category'])->name('News Category');




