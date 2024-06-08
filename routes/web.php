<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarPklController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PKLController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UsersController;
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

// ROUTR LOGIN & LOGOUT
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ROUTE ADMIN
Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('siswa', SiswaController::class);
    Route::resource('user', UsersController::class);
    Route::resource('pkl', PKLController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('nilai', NilaiController::class);
    Route::resource('laporan', LaporanController::class);
});

// END ROUTE ADMIN


// ROUTE SISWA
Route::group(['middleware' => ['siswa'], 'prefix' => 'siswa', 'as' => 'siswa.'], function () {
    Route::get('daftar',[DaftarPklController::class, 'index'])->name('daftar.index');
    Route::resource('siswa', SiswaController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('laporan', LaporanController::class);
});
// END ROUTE SISWA

// ROUTE PEMBIMBING SEKOLAH
Route::group(['middleware' => ['psekolah'], 'prefix' => 'psekolah', 'as' => 'psekolah.'], function () {
    // Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('absensi', AbsensiController::class);
    Route::resource('nilai', NilaiController::class);
});
// END ROUTE PEMBIMBING SEKOLAH

// ROUTE PEMBIMBING INDUSTRI
Route::group(['middleware' => ['pindustri'], 'prefix' => 'pindustri', 'as' => 'pindustri.'], function () {
    // Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('absensi', AbsensiController::class);
    Route::resource('nilai', NilaiController::class);
});
// END ROUTE PEMBIMBING INDUSTRI

// Route::get('/', function () {
//     return view('welcome');
// });
