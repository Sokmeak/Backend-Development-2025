<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Intervention\Image\Image as ImageImage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    // public function index()
    // {
    //     $images = ImageImage::latest()->get();
    //     return view('gallery.index', compact('images'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image',
    //     ]);

    //     $file = $request->file('image');
    //     $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();  // More secure filename

    //     // Store the original image
    //     $originalPath = $file->storeAs('uploads', $fileName, 'minio');

    //     // Generate a thumbnail
    //     $thumb = InterventionImage::make($file->getRealPath())
    //     ->fit(200, 200, function ($constraint) {
    //         $constraint->aspectRatio();
    //     })->encode();

    //     // Define thumbnail path with folder structure
    //     $thumbnailPath = 'uploads/thumbnails/' . $fileName;
    //     Storage::disk('minio')->put($thumbnailPath, $thumb);

    //     // Store image information in the databasex`x
    //     Image::create([
    //         'original_path'  => $originalPath,
    //         'thumbnail_path' => $thumbnailPath,
    //     ]);

    //     return redirect()->route('gallery.index')
    //                      ->with('success', 'Image uploaded successfully!');
    // }

    // public function destroy(ImageImage $image)
    // {
    //     // Delete the original and thumbnail images from MinIO
    //     Storage::disk('minio')->delete([$image->original_path, $image->thumbnail_path]);
    //     $image->delete();
    //     return back()->with('success', 'Image deleted.');
    // }




    public function upload(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
    
        // Store to local 'public' disk
        $path = $request->file('document')->store('uploads');

        // Store to minio
        $file = $request->file('document');
        $fileName = basename($path);

        $minioPath = false;
        if (Storage::disk('minio')->putFileAs('uploads', $file, $fileName)) {
            $minioPath = 'uploads/' . $fileName;
        }
    
        return response()->json([
            'local_path' => $path,
            'minio_path' => $minioPath,
        ], 200);
    }
    

    public function store(Request $request)
    {
        $request->validate([
        'image' => 'required|image|max:2048' // Validation rules for upload
        ]);
        
        $image = $request->file('image');
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('uploads', $fileName); // Store the original image
        // (Optional) Using Intervention Image
        $thumbnailPath = 'thumbnails/' . $fileName;

        // can use it
        $intervention = InterventionImage::make($image->getRealPath());


     
        $intervention->fit(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path('app/' . $thumbnailPath));

     
        // (Alternative) Using pure Imagick
        //  $imagick = new Imagick(storage_path('app/uploads/' . $fileName));
        //  $imagick->resizeImage(200, 200, Imagick::FILTER_TRIANGLE, 1);
        //  $imagick->writeImage(storage_path('app/thumbnails/' . $fileName));
        // Update your Image model to store original and thumbnail paths
        return redirect()->route('gallery.index')->with('success', 'Image uploaded');
    }
}
