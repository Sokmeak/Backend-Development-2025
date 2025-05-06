<?php
namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as InterventionImage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        return view('gallery.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $file = $request->file('image');
        $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();  // More secure filename

        // Store the original image
        $originalPath = $file->storeAs('uploads', $fileName, 'minio');

        // Generate a thumbnail
        $thumb = InterventionImage::make($file->getRealPath())
            ->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();

        // Define thumbnail path with folder structure
        $thumbnailPath = 'uploads/thumbnails/' . $fileName;
        Storage::disk('minio')->put($thumbnailPath, $thumb);

        // Store image information in the databasex`x
        Image::create([
            'original_path'  => $originalPath,
            'thumbnail_path' => $thumbnailPath,
        ]);

        return redirect()->route('gallery.index')
                         ->with('success', 'Image uploaded successfully!');
    }

    public function destroy(Image $image)
    {
        // Delete the original and thumbnail images from MinIO
        Storage::disk('minio')->delete([$image->original_path, $image->thumbnail_path]);
        $image->delete();
        return back()->with('success', 'Image deleted.');
    }
}
