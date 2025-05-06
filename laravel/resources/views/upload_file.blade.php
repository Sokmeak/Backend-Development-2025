<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload file</title>
</head>
<body>

    <h3>Upload File</h3>
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="document"/>
        <button type="submit">Upload</button>
    </form>
    
</body>
</html>