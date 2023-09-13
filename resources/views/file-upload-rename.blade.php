<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>File Upload</title>
</head>
<body>

    <div class="container mt-3">
        <h2>File Upload</h2>
        <hr>

        <form action="{{url('/file-upload-rename')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_gambar" class="form-label">Nama Gambar</label>
                <input type="text" class="form-control" id="nama_gambar" name="nama_gambar" value="{{ old('nama_gambar') }}">
                @error('nama_gambar')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar_profile" class="form-label">Gambar Profile</label>
                <input type="file" class="form-control" id="gambar_profile" name="gambar_profile">
                @error('gambar_profile')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary my-2">Upload</button>
        </form>
    </div>

</body>
</html>
