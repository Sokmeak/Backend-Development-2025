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


Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::delete('/gallery/{image}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

Route::get('/storage-test', function () {
    try {
        $minio = Storage::disk('minio'); // Changed to use 'minio' disk
        
        $minio->put('reset_test.txt', 'Connected to MinIO successfully!');
        $content = $minio->get('test_file.txt');
        
        return response()->json([
            'status' => 'success',
            'content' => $content,
            'config' => config('filesystems.disks.minio')
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'MinIO connection failed: ' . $e->getMessage()
        ], 500);
    }
});

Route::get('/minio-debug', function () {
    $s3 = Storage::disk('s3');
    $testContent = "Test @ ".now();
    $filename = "debug_".time().".txt";

    try {
        // 1. Write test
        $s3->put($filename, $testContent);
        
        // 2. Verify write
        $exists = $s3->exists($filename);
        $files = $s3->files('/');
        
        // 3. Direct MinIO API check
        $client = $s3->getClient();
        $result = $client->listObjectsV2([
            'Bucket' => config('filesystems.disks.s3.bucket')
        ]);
        
        return response()->json([
            'written_content' => $testContent,
            'file_exists' => $exists,
            'files_in_root' => $files,
            'minio_api_result' => $result->toArray(),
            'bucket' => config('filesystems.disks.s3.bucket'),
            'actual_endpoint' => $client->getEndpoint()
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});

require __DIR__.'/auth.php';
