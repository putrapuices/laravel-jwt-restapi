<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswasaja;
use Illuminate\Http\Request;

class MahasiswasajaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswasaja::all();
        return view('mahasiswasaja.index', ['mahasiswas' => $mahasiswas]);
    }

    public function create()
    {
        return view('mahasiswasaja/form');
    }

    public function store(Request $request)
    {
        // $validateData = $request->validate([
        //     'nim' => 'required|size:8',
        //     'nama' => 'required|min:3|max:50',
        //     'jenis_kelamin' => 'required|in:P,L',
        //     'jurusan' => 'required',
        //     'alamat' => '',
        // ]);
        // dump($validateData);

        $validateData = $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas',
            //jika nama  kolom tabel tidak sama dengan nama inputan form
            // maka contohnya 'nim' => 'required|size:8|unique:mahasiswas,nim_mhs',
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
        ]);

        // $mahasiswa = new Mahasiswasaja();
        // $mahasiswa->nim = $validateData['nim'];
        // $mahasiswa->nama = $validateData['nama'];
        // $mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
        // $mahasiswa->jurusan = $validateData['jurusan'];
        // $mahasiswa->alamat = $validateData['alamat'];
        // $mahasiswa->tanggal_lahir =new \DateTime();
        // $mahasiswa->save();
        $validateData['tanggal_lahir'] = new \DateTime();
        Mahasiswasaja::create($validateData);

        $request->session()->flash('pesan', "Penambahan data {$validateData['nama']} berhasil");
        return redirect()->route('mahasiswas.index');
    }

    // public function show($mahasiswa)
    // {
    //     $result = Mahasiswasaja::find($mahasiswa);
    //     if ($result) {
    //         // Data mahasiswa ditemukan, tampilkan tampilan yang sesuai
    //         return view('mahasiswasaja.show', ['mahasiswa' => $result]);
    //     } else {
    //         // Data mahasiswa tidak ditemukan, berikan respons atau tampilan yang sesuai
    //         // return view('mahasiswasaja.not_found');
    //         // atau
    //         // return redirect()->route('mahasiswa.not_found');
    //         // atau
    //         return abort(404);
    //     }
    // }
    // atau show di bawah dengan route model binding,diakan mencri di models Mahasiswasaja

    public function show(Mahasiswasaja $mahasiswa)
    {
        return view('mahasiswasaja.show', ['mahasiswa' => $mahasiswa]);
    }

    public function edit(Mahasiswasaja $mahasiswa)
    {
        return view('mahasiswasaja.edit', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, Mahasiswasaja $mahasiswa)
    {
        $validateData = $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
        ]);

        // Mahasiswasaja::where('id', $mahasiswa->id)->update($validateData);
        // atau tanpa class Mahasiswasaja
        $mahasiswa->update($validateData);

        return redirect()->route('mahasiswas.show', ['mahasiswa' => $mahasiswa->id])
            ->with('pesan', "Update data {$validateData['nama']} berhasil");
    }

    public function destroy(Mahasiswasaja $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')
            ->with('pesan', "Hapus data $mahasiswa->nama berhasil");
    }
}
