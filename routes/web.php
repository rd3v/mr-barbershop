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
    

});

