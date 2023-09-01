<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Coba\Foo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function tampil()
    {
        $arrMahasiswa = [
            "Risa Lestari", "Rudi Hermawan", "Bambang Kusumo",
            "Lisa Permata"
        ];

        return view('mahasiswa')->with('mahasiswa', $arrMahasiswa);
    }
    public function cobaFacade()
    {
        echo \Illuminate\Support\Str::snake('SedangBelajarLaravelUncover');
        echo "<br>";
        echo \Illuminate\Support\Str::kebab('SedangBelajarLaravelUncover');
        echo "<br>";
        echo Str::snake('SedangBelajarLaravelUncover');
    }

    public function cobaClass()
    {
        $foo = new Foo();
        echo $foo->bar();
    }
}
