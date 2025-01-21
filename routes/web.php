<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MedikitController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth;


Route::middleware('guest')->group(function (){
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::middleware(['auth', 'verified', 'role:admin|operator|karyawan'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function(){
        return redirect(auth()->user()->getRoleName()->first().'/dashboard');
    })->name('dashboard');

    // API
    Route::get('/api/medikit/{key}', [MedikitController::class, 'MediktiAPI'])->name('medikit.api');
});

Route::middleware(['auth', 'verified', 'role:operator'])->group(function () {
    Route::get('/operator/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard.operator');
});

Route::middleware(['auth', 'verified', 'role:karyawan'])->group(function () {
    Route::get('/karyawan/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard.karyawan');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard.admin');

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
    Route::get('/medikit/{medikit}/edit', [MedikitController::class, 'edit'])->name('medikit');
    Route::post('/medikit/{medikit}/edit', [MedikitController::class, 'update']);
    Route::get('/medikit/{medikit}/hapus', [MedikitController::class, 'destroy']);

    // bagian karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::post('/karyawan/tambah', [KaryawanController::class, 'store']);
    Route::post('/karyawan/{karyawan}', [KaryawanController::class, 'update']);
    Route::get('/karyawan/{karyawan}/hapus', [KaryawanController::class, 'destroy']);

    // bagian kasir
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::post('/transaksi', [TransaksiController::class, 'store']);
    Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');

    // rekapitulasi
    Route::get('/rekap', [TransaksiController::class, 'rekap']);

    // notifikasi
    Route::get('/notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.read');

});

require __DIR__ . '/auth.php';
