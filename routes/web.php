<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware('admin')->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
// });

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('siswa', SiswaController::class);
});

Route::middleware('user')->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

// Route::get('/', function () {
//     return view('welcome');
// });
