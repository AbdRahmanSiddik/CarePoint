<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->unsignedInteger('id_transaksi')->autoIncrement();
            $table->string('token_transaksi', 16);
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();
            $table->string('nama_customer', 100)->nullable();
            $table->string('alamat_customer')->nullable();
            $table->string('kontak')->nullable();
            $table->unsignedInteger('jumlah_barang');
            $table->decimal('total_harga', 19, 2);
            $table->enum('status_bayar', ['sukses', 'pending', 'gagal', 'retur'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
