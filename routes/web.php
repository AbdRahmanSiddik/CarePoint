<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MedikitController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::post('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/{kategori}/destroy', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// supplier
Route::get('/supplier', [SupplierController::class, 'index']);
Route::post('/supplier/tambah', [SupplierController::class, 'store']);
Route::post('/supplier/{supplier}/edit', [SupplierController::class, 'update'])->name('supplier.edit');
Route::get('/supplier/{supplier}/hapus', [SupplierController::class, 'destroy']);

//medikit
Route::get('/medikit', [MedikitController::class, 'index']);
Route::get('/medikit/tambah', [MedikitController::class, 'create']);
Route::post('/medikit/tambah', [MedikitController::class, 'store']);
Route::get('/medikit/{medikit}/edit', [MedikitController::class, 'edit']);
Route::post('/medikit/{medikit}/edit', [MedikitController::class, 'update']);
Route::get('/medikit/{medikit}/hapus', [MedikitController::class, 'destroy']);
