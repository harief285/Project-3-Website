<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('riwayat', function () {
    return view('riwayat.index');
});
    
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'user-access:pasien'])->group(function () 
{
    Route::get('/pasien/home', [HomeController::class, 'index'])->name('pasien');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () 
{
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin');
    Route::get('/admin/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
    Route::post('/admin/register', [RegisterController::class, 'register'])->name('register'); 
});