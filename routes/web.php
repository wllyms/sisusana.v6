<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TuserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\PertanyaanController;
use App\Models\Jawaban;

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


// ====== Login ======
// Route::middleware('guest')->group(function () {
//     Route::get('/adminlogin', [SesiController::class, 'index']);
//     Route::post('/adminlogin', [SesiController::class, 'login']);
// });

// Route::get('/login-admin', function () {
//     return view('login-admin');
// });

// Route::get('/logout', [SesiController::class, 'logout']);
// Route::get('/admin', [JawabanController::class, 'index']);


// ====== BERANDA ======
Route::get('/beranda', [JawabanController::class, 'tampiljawaban'])->name('beranda.tampiljawaban');

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

// ====== SURVEY ======
Route::get('/', [SurveyController::class, 'tampilpertanyaan'])->name('survey.tampil');
Route::post('/survey/submit', [SurveyController::class, 'submit'])->name('survey.submit');

// ====== Hasil ======
Route::get('/hasil/grafik-keseluruhan', [JawabanController::class, 'tampilgrafikkeseluruhan'])->name('hasil.tampilgrafikkeseluruhan');
Route::get('/hasil/persentase-pertanyaan', [JawabanController::class, 'tampilpersenpertanyaan'])->name('hasil.tampilgrafikpertanyaan');
Route::get('/hasil/laporan', [JawabanController::class, 'tampillaporan'])->name('hasil.tampillaporan');
Route::get('/detaillaporan/{id}', [JawabanController::class, 'detaillaporan'])->name('survey.detail');
Route::get('/cetakdetail/{id}', [JawabanController::class, 'cetakdetail'])->name('survey.cetakdetail');
Route::post('/hapuslaporan/{id}', [JawabanController::class, 'hapuslaporan'])->name('survey.hapus');


Route::get('/rekapkritik', [JawabanController::class, 'detailrekapkritik'])->name('rekap.kritik');
Route::get('/pdf-rekapkritik', [JawabanController::class, 'exportKritikPDF'])->name('export.kritik-pdf');
Route::get('/excel-rekapkritik', [JawabanController::class, 'exportKritikExcel'])->name('export.kritik-excel');

Route::get('/rekapsurvey', [JawabanController::class, 'detailrekapsemua'])->name('rekap.detail');
Route::get('/pdf-rekapsurvey', [JawabanController::class, 'exportSurveyPDF'])->name('export.survey-pdf');
Route::get('/excel-rekapsurvey', [JawabanController::class, 'exportSurveyExcel'])->name('export.survey-excel');

