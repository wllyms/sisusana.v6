<?php

use App\Http\Controllers\GrupController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\TuserController;
use Illuminate\Support\Facades\Route;

// ====== Sidebar ======
Route::get('/', function () {
    return view('survei');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/manajemen-pertanyaan', function () {
    return view('manajemen-pertanyaan.tampil');
});

Route::get('/manajemen-user', function () {
    return view('manajemen-user.tampil');
});

Route::get('/manajemen-grup', function () {
    return view('manajemen-grup.tampil');
});

Route::get('/adminlogin', function () {
    return view('login-admin');
});



// ====== Manajemen User ======
Route::get('/manajemen-user', [TuserController::class, 'tampil'])->name('manajemen-user.tampil');
Route::get('/manajemen-user/tambah', [TuserController::class, 'tambah'])->name('manajemen-user.tambah');
Route::post('/manajemen-user/submit', [TuserController::class, 'submit'])->name('manajemen-user.submit');
Route::get('/edit-user/{id}', [TuserController::class, 'edit'])->name('manajemen-user.edit');
Route::post('/exedit-user/{id}', [TuserController::class, 'exedit'])->name('manajemen-user.exedit');
Route::post('/hapus-user/{id}', [TuserController::class, 'hapus'])->name('manajemen-user.hapus');

// ====== Manajemen Grup ======
Route::get('/manajemen-grup', [GrupController::class, 'tampil'])->name('manajemen-grup.tampil');
Route::get('/tambah-grup/tambah', [GrupController::class, 'tambah'])->name('manajemen-grup.tambah');
Route::post('/manajemen-grup/submit', [GrupController::class, 'submit'])->name('manajemen-grup.submit');
Route::get('/edit-grup/{id}', [GrupController::class, 'edit'])->name('manajemen-grup.edit');
Route::post('/exedit-grup/{id}', [GrupController::class, 'exedit'])->name('manajemen-grup.exedit');
Route::post('/hapus-grup/{id}', [GrupController::class, 'hapus'])->name('manajemen-grup.hapus');

// ====== Manajemen Pertanyaan ======
Route::get('/manajemen-pertanyaan', [PertanyaanController::class, 'tampil'])->name('manajemen-pertanyaan.tampil');
Route::get('/tambah-pertanyaan/tambah', [PertanyaanController::class, 'tambah'])->name('manajemen-pertanyaan.tambah');
Route::get('/tambah-pertanyaan/tambah', [PertanyaanController::class, 'select_grup'])->name('manajemen-pertanyaan.select_grup');
Route::post('/manajemen-pertanyaan/submit', [PertanyaanController::class, 'submit'])->name('manajemen-pertanyaan.submit');
Route::get('/edit-pertanyaan/{id}', [PertanyaanController::class, 'edit'])->name('manajemen-pertanyaan.edit');
Route::post('/exedit-pertanyaan/{id}', [PertanyaanController::class, 'exedit'])->name('manajemen-pertanyaan.exedit');
Route::post('/hapus-pertanyaan/{id}', [PertanyaanController::class, 'hapus'])->name('manajemen-pertanyaan.hapus');

// ====== Hasil ======
Route::get('/hasil/grafik-keseluruhan', function () {
    return view('hasil.grafik-keseluruhan');
});

Route::get('/hasil/grafik-pertanyaan', function () {
    return view('hasil.grafik-pertanyaan');
});

Route::get('/hasil/kritikdansaran', function () {
    return view('hasil.kritikdansaran');
});

Route::get('/hasil/laporan', function () {
    return view('hasil.laporan');
});
