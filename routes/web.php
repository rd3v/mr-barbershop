<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    Route::get('/my-profile',[\App\Http\Controllers\DashboardController::class,'profile'])->name('my-profile');

    Route::get('/data-pelanggan',[\App\Http\Controllers\DataPelanggan::class, 'index'])->name('data-pelanggan');
    Route::get('/data-pelanggan/tambah',[\App\Http\Controllers\DataPelanggan::class, 'create'])->name('tambah-data-pelanggan');
    Route::post('/data-pelanggan/store',[\App\Http\Controllers\DataPelanggan::class, 'store'])->name('submit-data-pelanggan');
    Route::get('/data-pelanggan/edit/{id}',[\App\Http\Controllers\DataPelanggan::class, 'edit'])->name('edit-data-pelanggan');
    Route::put('/data-pelanggan/update/{id}',[\App\Http\Controllers\DataPelanggan::class, 'update'])->name('update-data-pelanggan');
    Route::delete('/data-pelanggan/delete/{id}',[\App\Http\Controllers\DataPelanggan::class, 'destroy'])->name('delete-data-pelanggan');
    

    Route::get('/data-layanan',[\App\Http\Controllers\DatalayananController::class, 'index'])->name('data-layanan');
    Route::get('/data-layanan/tambah',[\App\Http\Controllers\DatalayananController::class, 'create'])->name('tambah-data-layanan');
    Route::post('/data-layanan/store',[\App\Http\Controllers\DatalayananController::class, 'store'])->name('submit-data-layanan');
    Route::get('/data-layanan/edit/{id}',[\App\Http\Controllers\DatalayananController::class, 'edit'])->name('edit-data-layanan');
    Route::put('/data-layanan/update/{id}',[\App\Http\Controllers\DatalayananController::class, 'update'])->name('update-data-layanan');
    Route::delete('/data-layanan/delete/{id}',[\App\Http\Controllers\DatalayananController::class, 'destroy'])->name('delete-data-layanan');
    
    Route::get('/data-booking',[\App\Http\Controllers\DatabookingController::class, 'index'])->name('data-booking');
    Route::get('/data-booking/tambah/{kode}',[\App\Http\Controllers\DatabookingController::class, 'create'])->name('tambah-data-booking');
    Route::post('/data-booking/store',[\App\Http\Controllers\DatabookingController::class, 'store'])->name('submit-data-booking');
    Route::get('/data-booking/edit/{id}',[\App\Http\Controllers\DatabookingController::class, 'edit'])->name('edit-data-booking');
    Route::put('/data-booking/update/{id}',[\App\Http\Controllers\DatabookingController::class, 'update'])->name('update-data-booking');
    Route::delete('/data-booking/delete/{id}/{booking}',[\App\Http\Controllers\DatabookingController::class, 'destroy'])->name('delete-data-booking');


    Route::get('/data-kapster',[\App\Http\Controllers\DatakapsterController::class, 'index'])->name('data-kapster');
    Route::get('/data-kapster/tambah',[\App\Http\Controllers\DatakapsterController::class, 'create'])->name('tambah-data-kapster');
    Route::post('/data-kapster/store',[\App\Http\Controllers\DatakapsterController::class, 'store'])->name('submit-data-kapster');
    Route::get('/data-kapster/edit/{id}',[\App\Http\Controllers\DatakapsterController::class, 'edit'])->name('edit-data-kapster');
    Route::put('/data-kapster/update/{id}',[\App\Http\Controllers\DatakapsterController::class, 'update'])->name('update-data-kapster');
    Route::delete('/data-kapster/delete/{id}',[\App\Http\Controllers\DatakapsterController::class, 'destroy'])->name('delete-data-kapster');

    Route::get('/data-informasi',[\App\Http\Controllers\DatainformasiController::class, 'index'])->name('data-informasi');
    Route::get('/data-informasi/tambah',[\App\Http\Controllers\DatainformasiController::class, 'create'])->name('tambah-data-informasi');
    Route::post('/data-informasi/store',[\App\Http\Controllers\DatainformasiController::class, 'store'])->name('submit-data-informasi');
    Route::get('/data-informasi/edit/{id}',[\App\Http\Controllers\DatainformasiController::class, 'edit'])->name('edit-data-informasi');
    Route::put('/data-informasi/update/{id}',[\App\Http\Controllers\DatainformasiController::class, 'update'])->name('update-data-informasi');
    Route::delete('/data-informasi/delete/{id}',[\App\Http\Controllers\DatainformasiController::class, 'destroy'])->name('delete-data-informasi');    

    Route::get('/data-laporan',[\App\Http\Controllers\DatalaporanController::class, 'index'])->name('data-laporan');
    Route::get('/data-laporan/tambah',[\App\Http\Controllers\DatalaporanController::class, 'create'])->name('tambah-data-laporan');
    Route::post('/data-laporan/store',[\App\Http\Controllers\DatalaporanController::class, 'store'])->name('submit-data-laporan');
    Route::get('/data-laporan/edit/{id}',[\App\Http\Controllers\DatalaporanController::class, 'edit'])->name('edit-data-laporan');
    Route::put('/data-laporan/update/{id}',[\App\Http\Controllers\DatalaporanController::class, 'update'])->name('update-data-laporan');
    Route::delete('/data-laporan/delete/{id}',[\App\Http\Controllers\DatalaporanController::class, 'destroy'])->name('delete-data-laporan');

});

