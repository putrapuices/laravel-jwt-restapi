<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaauthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswamiddlewareController;
use App\Http\Controllers\MahasiswasajaController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/daftar-mahasiswaauth', [MahasiswaauthController::class,'daftarMahasiswa'])
 ->middleware('auth');

 Route::get('/tabel-mahasiswaauth', [MahasiswaauthController::class,'tabelMahasiswa'])
 ->middleware('auth');

 Route::get('/blog-mahasiswaauth', [MahasiswaauthController::class,'blogMahasiswa'])
 ->middleware('auth');

Route::get('/selamatdatang', function () {
    return view('selamatdatang');
});
//=============================================================================================
Route::get('/jurusan', [JurusanController::class,'index'])->middleware('auth');
Route::resource('jurusans',JurusanController::class)->middleware('auth');

//====================================================================================================


Route::get('/coba-facade', [PageController::class, 'cobaFacade']);

Route::get('/mahasiswaget', [PageController::class, 'index']);
Route::get('/coba-class', [PageController::class, 'cobaClass']);
Route::get('/mahasiswa', [PageController::class, 'tampil']);
Route::get('/mahasiswa', [MahasiswaController::class, 'mahasiswa'])
    ->name('mahasiswa');
Route::get('/mahasiswa', 'MahasiswaController@mahasiswa')->name('mahasiswa'); //ini cara penulisan laravel 7
Route::get('/dosen', [MahasiswaController::class, 'dosen'])
    ->name('dosen');
Route::get('/gallery', [MahasiswaController::class, 'gallery'])
    ->name('gallery');
Route::get(
    'informasi/{fakultas}/{jurusan}',
    [MahasiswaController::class, 'info']
)->name('info');


Route::get('/mahasiswaindex', [MahasiswaController::class, 'index']);
Route::post('/proses-form', [MahasiswaController::class, 'prosesForm']);
Route::post('/proses-form-request', [MahasiswaController::class, 'prosesFormRequest']);


Route::get('/form-pendaftaran/id', [
    MahasiswaController::class,
    'formPendaftaranId'
]);

Route::get('/form-pendaftaran/en', [
    MahasiswaController::class,
    'formPendaftaranEn'
]);

// agar dinamis tidak perlu buat "/id" atau "/en" seperti diatas
Route::get('/form-pendaftarandynamic/{locale?}', [
    MahasiswaController::class,
    'formPendaftarandynamic'
]);

// ===========================================================================================

Route::get('/satu', [CollectionController::class, 'collectionSatu']);
Route::get('/dua', [CollectionController::class, 'collectionDua']);
Route::get('/tiga', [CollectionController::class, 'collectionTiga']);
Route::get('/empat', [CollectionController::class, 'collectionEmpat']);
Route::get('/lima', [CollectionController::class, 'collectionLima']);
Route::get('/enam', [CollectionController::class, 'collectionEnam']);

// ==========================raw query==========================================================

Route::get('/insert-sql', [MahasiswaController::class, 'insertSql']);
Route::get('/insert-timestamp', [MahasiswaController::class, 'insertTimestamp']);
Route::get('/insert-prepared', [MahasiswaController::class, 'insertPrepared']);
Route::get('/insert-binding', [MahasiswaController::class, 'insertBinding']);
Route::get('/update', [MahasiswaController::class, 'update']);
Route::get('/delete', [MahasiswaController::class, 'delete']);
Route::get('/select', [MahasiswaController::class, 'select']);
Route::get('/select-tampil', [MahasiswaController::class, 'selectTampil']);
Route::get('/select-view', [MahasiswaController::class, 'selectView']);
Route::get('/select-where', [MahasiswaController::class, 'selectWhere']);
Route::get('/statement', [MahasiswaController::class, 'statement']);

// ==========================query builder==========================================================

Route::get('/insert', [MahasiswaController::class, 'insert']);
Route::get('/insert-banyak', [MahasiswaController::class, 'insertBanyak']);
Route::get('/update2', [MahasiswaController::class, 'update2']);
Route::get('/update-where', [MahasiswaController::class, 'updateWhere']);
Route::get('/update-or-insert', [MahasiswaController::class, 'updateOrInsert']);
Route::get('/delete2', [MahasiswaController::class, 'delete2']);
Route::get('/get', [MahasiswaController::class, 'get']);
Route::get('/get-tampil', [MahasiswaController::class, 'getTampil']);
Route::get('/get-view', [MahasiswaController::class, 'getView']);
Route::get('/get-where', [MahasiswaController::class, 'getWhere']);
Route::get('/select2', [MahasiswaController::class, 'select2']);
Route::get('/take', [MahasiswaController::class, 'take']);
Route::get('/first', [MahasiswaController::class, 'first']);
Route::get('/find', [MahasiswaController::class, 'find']);
Route::get('/raw', [MahasiswaController::class, 'raw']);

Route::get('/mahasiswalink', [MahasiswaController::class, 'mahasiswalink']);
Route::get('/mahasiswalink/{nim}', [MahasiswaController::class, 'mahasiswalinkdetail']);

// ==========================eloquent ORM==========================================================

Route::get('/cek-object', [MahasiswaController::class, 'cekObject']);

Route::get('/insertorm', [MahasiswaController::class, 'insertorm']);
Route::get('/mass-assignment', [MahasiswaController::class, 'massAssignment']);
Route::get('/mass-assignment2', [MahasiswaController::class, 'massAssignment2']);

Route::get('/updateorm', [MahasiswaController::class, 'updateorm']);
Route::get('/update-whereorm', [MahasiswaController::class, 'updateWhereorm']);
Route::get('/mass-update', [MahasiswaController::class, 'massUpdate']);

Route::get('/deleteorm', [MahasiswaController::class, 'deleteorm']);
Route::get('/destroy', [MahasiswaController::class, 'destroy']);
Route::get('/mass-delete', [MahasiswaController::class, 'massDelete']);

Route::get('/all', [MahasiswaController::class, 'all']);
Route::get('/all-view', [MahasiswaController::class, 'allView']);
Route::get('/get-whereorm', [MahasiswaController::class, 'getWhereorm']);
Route::get('/test-where', [MahasiswaController::class, 'testWhere']);
Route::get('/firstobject', [MahasiswaController::class, 'firstobject']);
Route::get('/firstobject2', [MahasiswaController::class, 'firstobject2']);
Route::get('/findorm', [MahasiswaController::class, 'findorm']);
Route::get('/latest', [MahasiswaController::class, 'latest']);
Route::get('/limit', [MahasiswaController::class, 'limit']);
Route::get('/skip-take', [MahasiswaController::class, 'skipTake']);

Route::get('/soft-delete', [MahasiswaController::class, 'softDelete']);


Route::get('/with-trashed', [MahasiswaController::class, 'withTrashed']);
Route::get('/restore', [MahasiswaController::class, 'restore']);
Route::get('/force-delete', [MahasiswaController::class, 'forceDelete']);


// ==========================================================================

Route::get('/hello', function () {
    $hello = 'Hello World';
    var_dump($hello);

    return $hello;
});

Route::get('/helloo', function () {
    $hello = ['Hello World', 2 => ['Hello Jakarta', 'Hello Medan']];
    dump($hello);

    return $hello;
});

Route::get('/hellooo', function () {
    $hello = ['Hello World', 2 => ['Hello Jakarta', 'Hello Medan']];

    echo '<pre>';
    print_r($hello);
    echo '</pre>';
    die();

    return $hello;
});





// =================materi crud=========================================

Route::get('/mahasiswas', [MahasiswasajaController::class, 'index'])
    ->name('mahasiswas.index');
Route::get('/mahasiswas/create', [MahasiswasajaController::class, 'create'])
    ->name('mahasiswas.create');
Route::post('/mahasiswas', [MahasiswasajaController::class, 'store'])
    ->name('mahasiswas.store');
Route::get('/mahasiswas/{mahasiswa}', [MahasiswasajaController::class, 'show'])
    ->name('mahasiswas.show');
Route::get('/mahasiswas/{mahasiswa}/edit', [MahasiswasajaController::class, 'edit'])
    ->name('mahasiswas.edit');
Route::put('/mahasiswas/{mahasiswa}', [MahasiswasajaController::class, 'update'])
    ->name('mahasiswas.update');
Route::delete('/mahasiswas/{mahasiswa}', [MahasiswasajaController::class, 'destroy'])
    ->name('mahasiswas.destroy');
// ===============end materi crud=======================================

// =============================upload file=======================================
Route::get('/file-upload', [FileUploadController::class, 'fileUpload']);
Route::post('/file-upload', [FileUploadController::class, 'prosesfileUpload']);

//berikut case study
Route::get('/file-upload-rename', [
    FileUploadController::class,
    'fileUploadRename'
]);

Route::post('/file-upload-rename', [
    FileUploadController::class,
    'prosesFileUploadRename'
]);
// =============================end upload file=======================================

//==========================midleware===========================================
// Route::get('/daftar-mahasiswa', [MahasiswamiddlewareController::class, 'daftarMahasiswa'])->middleware('coba');
Route::get('/daftar-mahasiswa', [MahasiswamiddlewareController::class, 'daftarMahasiswa']);
Route::get('/tabel-mahasiswa', [MahasiswamiddlewareController::class, 'tabelMahasiswa']);
Route::get('/blog-mahasiswa', [MahasiswamiddlewareController::class, 'blogMahasiswa']);
// =============================end midleware=======================================
//===============================session=======================================
Route::get('/', [SessionController::class, 'index']);
Route::get('/buat-session', [SessionController::class, 'buatSession']);
Route::get('/akses-session', [SessionController::class, 'aksesSession']);
Route::get('/hapus-session', [SessionController::class, 'hapusSession']);
Route::get('/flash-session', [SessionController::class, 'flashSession']);

// ini adalah contoh membuat flash session
// redirect()->route('mahasiswas.index')->with('pesan', "Penambahan data berhasil");

//================================end session========================
//================================Case Study: Login Middleware==============================================
Route::get('/loginsaja', [MahasiswamiddlewareController::class,'loginsaja']);
 Route::post('/loginsaja', [MahasiswamiddlewareController::class,'prosesLogin']);

 Route::get('/logout', [MahasiswamiddlewareController::class,'logout']);

 Route::redirect('/', '/loginsaja');

 Route::get('/daftar-mahasiswa', [MahasiswamiddlewareController::class,'daftarMahasiswa'])
 ->middleware('loginsaja');

 Route::get('/tabel-mahasiswa', [MahasiswamiddlewareController::class,'tabelMahasiswa'])
 ->middleware('loginsaja');

 Route::get('/blog-mahasiswa', [MahasiswamiddlewareController::class,'blogMahasiswa'])
 ->middleware('loginsaja');




//================================================================================

