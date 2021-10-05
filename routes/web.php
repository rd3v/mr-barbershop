<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

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
    

    Route::get('/data-kapster',[\App\Http\Controllers\DatakapsterController::class, 'index'])->name('data-kapster');
    Route::get('/data-kapster/tambah',[\App\Http\Controllers\DatakapsterController::class, 'create'])->name('tambah-data-kapster');
    Route::post('/data-kapster/store',[\App\Http\Controllers\DatakapsterController::class, 'store'])->name('submit-data-kapster');
    Route::get('/data-kapster/edit/{id}',[\App\Http\Controllers\DatakapsterController::class, 'edit'])->name('edit-data-kapster');
    Route::put('/data-kapster/update/{id}',[\App\Http\Controllers\DatakapsterController::class, 'update'])->name('update-data-kapster');
    Route::delete('/data-kapster/delete/{id}',[\App\Http\Controllers\DatakapsterController::class, 'destroy'])->name('delete-data-kapster');


});

