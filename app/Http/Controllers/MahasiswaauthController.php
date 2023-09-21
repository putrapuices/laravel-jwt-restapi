<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaauthController extends Controller
{
    public function daftarMahasiswa(Request $request)
    {
        // echo Auth::user()->id . "<br>";
        // echo Auth::user()->name . "<br>";
        // echo Auth::user()->email . "<br>";
        // echo Auth::user()->password . "<br>";
        // dump(Auth::user());

        $request->user()->id . "<br>";
        $request->user()->name . "<br>";
        $request->user()->email . "<br>";
        $request->user()->password . "<br>";

        if (Auth::check()) {
            echo "Selamat datang, " . $request->user()->name;
        } else {
            echo "Silahkan login terlebih dahulu";
        }
        return view('halamanauth', ['judul' => 'Daftar Mahasiswa']);


    }
    public function tabelMahasiswa()
    {
        return view('halamanauth', ['judul' => 'Tabel Mahasiswa']);
    }

    public function blogMahasiswa()
    {
        return view('halamanauth', ['judul' => 'Blog Mahasiswa']);
    }
}
