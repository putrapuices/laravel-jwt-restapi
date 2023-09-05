<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Form Registrasi</title>
</head>
<body>

    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>Pendaftaran Mahasiswa</h1>
                <hr>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- form action="{{url('/proses-form')}}" method="POST"> --}}
                    <form action="{{url('/proses-form-request')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="nim">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') }}">
                        @error('nim')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <input type="radio" name="jenis_kelamin" value="L" @checked(old('jenis_kelamin')=='L' )>Laki-laki

                        <input type="radio" name="jenis_kelamin" value="P" @checked(old('jenis_kelamin')=='P' )>Perempuan
                    </div>
                    <div class="mb-3">

                    <select name="jurusan">
                        <option value="Teknik Informatika" @selected(old('jurusan')=='Teknik Informatika' )>Teknik Informatika
                        </option>
                        <option value="Sistem Informasi" @selected(old('jurusan')=='Sistem Informasi' )>Sistem Informasi
                        </option>
                        <option value="Ilmu Komputer" @selected(old('jurusan')=='Ilmu Komputer' )>Ilmu Komputer
                        </option>
                        <option value="Teknik Komputer" @selected(old('jurusan')=='Teknik Komputer' )>Teknik Komputer
                        </option>
                        <option value="Teknik Telekomunikasi" @selected(old('jurusan')=='Teknik Telekomunikasi' )>Teknik Telekomunikasi
                        </option>
                    </select>
                </div>

                    <button type="submit" class="btn btn-primary mb-2">Daftar</button>
                </form>

            </div>
        </div>


    </div>

</body>
</html>
