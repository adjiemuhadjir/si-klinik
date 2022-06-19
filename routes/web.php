<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PembayaranController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/pegawai/{id}', [PegawaiController::class, 'edit']);
Route::get('pegawai/hapus/{id}', [PegawaiController::class, 'destroy']);
Route::resource('pegawai', PegawaiController::class);


Route::get('/wilayah/{id}', [WilayahController::class, 'edit']);
Route::get('wilayah/hapus/{id}', [WilayahController::class, 'destroy']);
Route::resource('wilayah', WilayahController::class);


Route::get('/poli/{id}', [PoliController::class, 'edit']);
Route::get('poli/hapus/{id}', [PoliController::class, 'destroy']);
Route::resource('poli', PoliController::class);


Route::get('/tindakan/{id}', [TindakanController::class, 'edit']);
Route::get('tindakan/hapus/{id}', [TindakanController::class, 'destroy']);
Route::resource('tindakan', TindakanController::class);


Route::get('/user/{id}', [UserController::class, 'edit']);
Route::get('user/hapus/{id}', [UserController::class, 'destroy']);
Route::resource('user', UserController::class);


Route::get('/obat/{id}', [ObatController::class, 'edit']);
Route::get('obat/hapus/{id}', [ObatController::class, 'destroy']);
Route::resource('obat', ObatController::class);


Route::get('/pasien/{id}', [PasienController::class, 'edit']);
Route::get('pasien/hapus/{id}', [PasienController::class, 'destroy']);
Route::resource('pasien', PasienController::class);


Route::get('/pendaftaran/{id}', [pendaftaranController::class, 'edit']);
Route::get('pendaftaran/hapus/{id}', [pendaftaranController::class, 'destroy']);
Route::resource('pendaftaran', pendaftaranController::class);


Route::get('/pemeriksaan/{id}', [PemeriksaanController::class, 'edit']);
Route::get('pemeriksaan/hapus/{id}', [PemeriksaanController::class, 'destroy']);
Route::resource('pemeriksaan', PemeriksaanController::class);


Route::get('/pembayaran/{id}', [PembayaranController::class, 'edit']);
Route::get('pembayaran/hapus/{id}', [PembayaranController::class, 'destroy']);
Route::resource('pembayaran', PembayaranController::class);
