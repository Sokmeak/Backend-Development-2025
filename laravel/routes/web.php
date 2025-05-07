<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Storage;

// the welcome for the root route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/upload_file', function () {
    return view('upload_file');

});

Route::post('/upload', [UploadController::class,'upload'])->name('upload');


// Route::get('/gallery', action: [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/gallery', function () {
    return view('gallery/index');

});
Route::post('/gallery', [GalleryController::class, 'upload'])->name('upload');



require __DIR__.'/auth.php';
