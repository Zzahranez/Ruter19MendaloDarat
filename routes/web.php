<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKelolaUser;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RiwayatController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('beranda');
})->name("beranda");

Route::get('/', [AdminController::class, 'berandaview'])->name('beranda');


// Login
Route::get("login", [LoginController::class, 'Tampilform'])->name("login");
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    return view('home');
})->name("home");

Route::get('home', [AdminController::class, 'indexshome'])->name('home');



Route::middleware(['auth'])->group(function () {
    Route::get('pengajuan', [PengajuanController::class, 'Tampilpengajuan'])->name('pengajuan');
});
Route::post('pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.submit');


// untuk tampilan riwayat dan download pdf
Route::resource('riwayat', RiwayatController::class)->middleware('auth');
Route::get('/download/{id}', [RiwayatController::class, 'download'])->name('download');


// For admin Users

 Route::middleware(AdminMiddleware::class)->group(function () {
    Route::resource('adminkelolauser', AdminKelolaUser::class);
    Route::resource('adminhome', AdminController::class);
});









