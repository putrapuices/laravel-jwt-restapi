<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:5000',
        ]);
        if ($request->hasFile('berkas')) {
            echo "path(): " . $request->berkas->path();
            echo "<br>";
            echo "extension(): " . $request->berkas->extension();
            echo "<br>";
            echo "getClientOriginalExtension(): " .
                $request->berkas->getClientOriginalExtension();
            echo "<br>";
            echo "getMimeType(): " . $request->berkas->getMimeType();
            echo "<br>";
            echo "getClientOriginalName(): " .
                $request->berkas->getClientOriginalName();
            echo "<br>";
            echo "getSize(): " . $request->berkas->getSize();
        } else {
            echo "Tidak ada berkas yang diupload";
        }

        // echo $request->berkas->getClientOriginalName() . " Lolos Validasi";
        // $path = $request->berkas->store('uploads');
        // jika ingn membuat nama file sendiri yang disimpa seprti ini jdinya
        //$path = $request->berkas->storeAs('uploads','berkas');mka nama file berkas.jpg
        //atau
        //$extFile = $request->berkas->getClientOriginalExtension();
        //$namaFile = 'lisa-' . time() . "." . $extFile;
        //$path = $request->berkas->storeAs('uploads', $namaFile);
        // echo "Proses upload berhasil, file berada di: $path";
        // =======================================================================
        $extFile = $request->berkas->getClientOriginalExtension();
        $namaFile = 'putra-' . time() . "." . $extFile;
        // $path = $request->berkas->storeAs('public', $namaFile);

        // $pathBaru = asset('storage/' . $namaFile);
        // echo "Proses upload berhasil, file berada di: <a href='$pathBaru'>$pathBaru</a>";
        //========================================================================
        // jika tidak maumenggunakan symlink dan mencoba method move maka berikut caranya

        $path = $request->berkas->move('image', $namaFile);
        $path = str_replace('\\', '/', $path);
        echo "Variabel path berisi: $path <br>";

        $pathBaru = asset('image/' . $namaFile);
        echo "Proses upload berhasil, file berada di: <a href='$pathBaru'>$pathBaru</a>";
    }

    public function fileUploadRename()
    {
        return view('file-upload-rename');
    }

    public function prosesFileUploadRename(Request $request)
    {
        $request->validate([
            'nama_gambar' => 'required|min:5|alpha_dash',
            'gambar_profile' => 'required|file|image|max:1000',
        ]);

        // ambil nama extension file asal
        $extFile = $request->gambar_profile->getClientOriginalExtension();
        // generate nama file akhir, diambil dari inputan nama_gambar + extension
        $namaFile = $request->nama_gambar . "." . $extFile;
        // pindahkan file upload ke folder storage/app/public/gambar/
        $request->gambar_profile->storeAs('public/gambar', $namaFile);

        // generate path gambar yang bisa diakses (path di folder public)
        $pathPublic = asset('storage/gambar/' . $namaFile);

        echo "Gambar berhasil di upload ke <a href=" . $pathPublic . ">$namaFile</a>";
        echo "<br><br>";
        echo "<img src=" . $pathPublic . " width='200px'>";
    }
}
