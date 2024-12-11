<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('details_transaksi', function (Blueprint $table) {
            $table->unsignedInteger('id_detail')->autoIncrement();
            $table->string('token_detail', 16);
            $table->unsignedInteger('transaksi_id');
            $table->unsignedInteger('medikit_id');
            $table->unsignedInteger('kuantitas');
            $table->decimal('jumlah_harga', 19, 2);
            $table->timestamps();

            $table->foreign('transaksi_id')
                  ->references('id_transaksi')
                  ->on('transaksis')
                  ->cascadeOnDelete();
            $table->foreign('medikit_id')
                  ->references('id_medikit')
                  ->on('medikits')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('details_transaksi');
    }
};
