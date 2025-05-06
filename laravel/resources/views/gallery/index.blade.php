<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Gallery</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body>
  
<div class="container mx-auto p-4">
  <h1 class="text-2xl font-bold mb-4">Image Gallery</h1>
  @if(session('success'))
    <div class="text-green-600 mb-2">{{ session('success') }}</div>
  @endif

  <!-- Upload Form -->
  <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
    @csrf
    <input type="file" name="image" required class="border p-2" />
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
  </form>

  <!-- Gallery -->
  <div class="grid grid-cols-3 gap-4">
    @foreach($images as $img)
      <div class=" p-2 ">
        <img src="{{ Storage::disk('minio')->url($img->thumbnail_path) }}" alt="Thumbnail" class="w-full h-auto mb-2">
        <div class = "d-flex flex-wrap"> <p> {{ Storage::disk('minio')->url($img->thumbnail_path) }}</p></div>
        <form action="{{ route('gallery.destroy', $img) }}" method="POST">

       
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-500">Delete</button>
        </form>
      </div>
    @endforeach
  </div>
</div>
</body>
</html>