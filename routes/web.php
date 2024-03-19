<?php
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\PaketWisata;
use App\Models\ObyekWisata;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(["login" => false, "register" => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/paket_wisata/{id}', [\App\Http\Controllers\PaketWisataController::class, 'detail'])->name('paket_wisata.detail');
Route::get('/penginpan/{id}', [\App\Http\Controllers\PenginapanController::class, 'detail'])->name('penginapan.detail');
Route::get('berita/{berita:id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('beritashow');
Route::get('/obyek_wisata/{id}', [\App\Http\Controllers\ObyekWisataController::class, 'detail'])->name('obyek_wisata.detail');
Route::get('obyek_wisata/{obyek_wisata:id}', [\App\Http\Controllers\HomeController::class, 'obyekshow'])->name('obyekshow');
Route::get('/obyek_wisata/create', 'ObyekWisataController@create')->name('obyek_wisata.create');
// Route::get('penginapan/{penginapan:id}', [\App\Http\Controllers\HomeController::class, 'penginapanshow'])->name('penginapanshow');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/laporan', [App\Http\Controllers\ReservasiController::class, 'laporan'])->name('laporan');
Route::get('/cetakreservasipertanggal', [App\Http\Controllers\ReservasiController::class, 'cetakreservasipertanggal'])->name('cetakreservasipertanggal');
Route::get('download-laporan-pdf/{tglawal}/{tglakhir}', [App\Http\Controllers\ReservasiController::class, 'downloadpdf']);

// Route::get('/profile', [App\Http\Controllers\PelangganController::class, 'profile'])->name('profile');

// Route::get('/pelanggan-profil', [ProfilPelangganController::class, 'index'])->name('pelanggan-profil.index');
// Route::get('/pelanggan-profil/create', [ProfilPelangganController::class, 'create'])->name('pelanggan-profil.create');
// Route::post('/pelanggan-profil/store', [ProfilPelangganController::class, 'store'])->name('pelanggan-profil.store');
// Route::get('/pelanggan-profil/{id}/edit', [ProfilPelangganController::class, 'edit'])->name('pelanggan-profil.edit');
// Route::put('/pelanggan-profil/{id}', [ProfilPelangganController::class, 'update'])->name('pelanggan-profil.update');


Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('karyawan', \App\Http\Controllers\KaryawanController::class)->middleware('auth');
Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class)->middleware('auth');
Route::resource('paket_wisata', \App\Http\Controllers\PaketWisataController::class)->middleware('auth');
Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->middleware('auth');
Route::resource('kategori_wisata', \App\Http\Controllers\KategoriWisataController::class)->middleware('auth');
Route::resource('obyek_wisata', \App\Http\Controllers\ObyekWisataController::class)->middleware('auth');
Route::resource('kategori_berita', \App\Http\Controllers\KategoriBeritaController::class)->middleware('auth');
Route::resource('berita', \App\Http\Controllers\BeritaController::class)->middleware('auth');
Route::resource('penginapan', \App\Http\Controllers\PenginapanController::class)->middleware('auth');
Route::resource('profil-pelanggan', \App\Http\Controllers\ProfilPelangganController::class)->middleware('auth');
Route::resource('bendahara_reservasi', \App\Http\Controllers\BendaharaController::class)->middleware('auth');
