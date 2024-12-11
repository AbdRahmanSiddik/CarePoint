<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MedikitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::post('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/{kategori}/destroy', [KategoriController::class, 'destroy'])->name('kategori.destroy');


//medikit
Route::get('/medikit', [MedikitController::class, 'index']);
Route::get('/medikit-tambah', [MedikitController::class, 'create']);
