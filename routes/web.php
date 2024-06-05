<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\Excel\ExcelController;
use App\Http\Controllers\ArtikelController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('riwayat', function () {
    return view('riwayat.index');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'user-access:pasien'])->group(function () {
    Route::get('/pasien/home', [HomeController::class, 'index'])->name('pasien');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin');
    Route::get('/admin/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
    Route::post('/admin/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/admin/riwayat', [HomeController::class, 'riwayat'])->name('riwayat');
    Route::get('/admin/akun', [HomeController::class, 'profile'])->name('akun');
    Route::put('/admin/update/{id}', [AkunController::class, 'updateprofile'])->name('akun.update');
    Route::put('/admin/update/password/{id}', [AkunController::class, 'updatepassword'])->name('akun.password');
    Route::get('/export-excel', [ExcelController::class, 'downloadRiwayat'])->name('export-excel');

    Route::get('/admin/artikel/index', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/admin/artikel/create', [ArtikelController::class, 'create'])->name('buat.artikel');
    Route::post('/admin/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/admin/artikel/show/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
    Route::get('/admin/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/admin/artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('admin/artikel/delete/{id}', [ArtikelController::class, 'destroy'])->name('artikel.delete');
});
