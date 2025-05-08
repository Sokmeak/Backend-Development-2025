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
    
        $file = $request->file('document');
        $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
    
        // Store original to local
        $localPath = $file->storeAs('uploads', $fileName, 'public');
    
        // Store original to minio
        $minioSuccess = Storage::disk('minio')->putFileAs('uploads', $file, $fileName);
    
        $minioPath = $minioSuccess ? 'uploads/' . $fileName : null;
    
        // Initialize thumbnail path as null
        $thumbnailPath = null;
    
        // If the file is an image, create a thumbnail
        if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {
            $thumb = InterventionImage::make($file->getRealPath())
                ->fit(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode();
    
            $thumbnailFileName = 'thumb_' . $fileName;
            $thumbnailPath = 'uploads/thumbnails/' . $thumbnailFileName;
    
            // Store thumbnail to minio
            Storage::disk('minio')->put($thumbnailPath, $thumb);
        }
    
        return response()->json([
            'local_path' => $localPath,
            'minio_path' => $minioPath,
            'minio_thumbnail' => $thumbnailPath,
        ]);
    }
    

    public function store(Request $request)
    {
      
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $image = $request->file('image');
        $fileName = Str::random(40) . '.' . $image->getClientOriginalExtension();

        // Store original image to 'uploads' folder in 'minio' disk
        $originalPath = $image->storeAs('uploads', $fileName, 'minio');

        // Create a thumbnail using Intervention Image
        $thumbnail = InterventionImage::make($image->getRealPath())
            ->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->encode(); // encode as original format

        // Define thumbnail path
        $thumbnailPath = 'uploads/thumbnails/' . $fileName;

        // Store thumbnail to 'minio'
        Storage::disk('minio')->put($thumbnailPath, $thumbnail);

        // Save paths to database
        Image::create([
            'original_path' => $originalPath,
            'thumbnail_path' => $thumbnailPath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Image and thumbnail uploaded.');



    }
}
