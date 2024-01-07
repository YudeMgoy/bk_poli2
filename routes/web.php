<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/obat',[App\Http\Controllers\ObatController::class, 'index'])->name('obat');
Route::get('/admin/obat/add',function(){return view("tambahobat");})->name('tambahobat');
Route::post('/admin/obat/store',[App\Http\Controllers\ObatController::class, 'store'])->name('storeobat');
Route::get('/admin/obat/edit/{id}',[App\Http\Controllers\ObatController::class, 'edit'])->name('editobat');
Route::post('/admin/obat/update',[App\Http\Controllers\ObatController::class, 'update'])->name('updateobat');
Route::get('/admin/obat/delete/{id}',[App\Http\Controllers\ObatController::class, 'delete'])->name('hapusobat');
Route::get('admin/dokter',[App\Http\Controllers\DokterController::class, 'index'])->name('dokter');
Route::get('admin/dokter/add',[App\Http\Controllers\DokterController::class, 'tambahdokter'])->name('tambahdokter');
Route::post('admin/dokter/storedokter',[App\Http\Controllers\DokterController::class, 'store'])->name('storedokter');

Route::get('admin/jadwalperiksa',[App\Http\Controllers\JadwalController::class, 'index'])->name('jadwalperiksa');
Route::get('admin/jadwalperiksa/add',[App\Http\Controllers\JadwalController::class, 'tambah'])->name('tambahjadwal');
Route::post('admin/jadwalperiksa/store',[App\Http\Controllers\JadwalController::class, 'store'])->name('storejadwal');
Route::get('admin/jadwalperiksa/aktifkan/{id}',[App\Http\Controllers\JadwalController::class, 'aktifkan'])->name('aktifkanjadwal');

Route::get('/pasien',[App\Http\Controllers\PasienController::class, 'index'])->name('pasien');
Route::get('/pasien/add',function(){return view("daftarpasien");})->name('tambahpasien');
Route::post('/pasien/daftarpasien',[App\Http\Controllers\PasienController::class, 'daftarpasien'])->name('daftarpasien');

Route::get('/pasien/tambahdaftarpoli/{id}',[App\Http\Controllers\PasienController::class, 'tambahdaftarpoli'])->name('tambahdaftarpoli');
Route::post('/pasien/storedaftarpoli',[App\Http\Controllers\PasienController::class, 'storedaftarpoli'])->name('storedaftarpoli');

Route::get('/poli',[App\Http\Controllers\PoliController::class, 'index'])->name('poli');
Route::get('/poli/add',function(){return view("tambahpoli");})->name('tambahpoli');
Route::post('/poli/storepoli',[App\Http\Controllers\PoliController::class, 'store'])->name('storepoli');

Route::get('/dokter/periksa', [App\Http\Controllers\PeriksaController::class, 'index'])->name('periksa');
Route::get('/dokter/periksa/add/{id}', [App\Http\Controllers\PeriksaController::class, 'Add'])->name('addperiksa');;
Route::post('/dokter/periksa/store', [App\Http\Controllers\PeriksaController::class, 'Store'])->name('storeperiksa');;

Route::get('/dokter/riwayatpasien', function(){
    return view('riwayat_pasien');
})->name('riwayat_pasien');
