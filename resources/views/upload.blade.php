<!DOCTYPE html>
<html>
<head>
    <title>Upload Gambar Laravel</title>
    @vite(['resources/css/app.css'])
</head>
<body class="flex flex-col items-center gap-6">
    <h2>Upload Gambar</h2>

    <a href="/logout">logout</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <h3>Gambar Terupload:</h3>
    @foreach(App\Models\Image::all() as $img)
        <div>
            <p>{{ $img->name }}</p>
            <img src="{{ asset('storage/' . $img->path) }}" width="200">
        </div>
    @endforeach
</body>
</html>