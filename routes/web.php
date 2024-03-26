<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:pasien'])->group(function () 
{
    Route::get('/pasien/home', [HomeController::class, 'index'])->name('pasien');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () 
{
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin');
    Route::get('/admin/register', [HomeController::class, 'registerForm'])->name('auth.register');
    
    // Route::get('/register', function () 
    // {
    //     return view('auth.registe');
    // });
});