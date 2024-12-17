<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medikits', function (Blueprint $table) {
            $table->unsignedInteger('id_medikit')->autoIncrement();
            $table->string('token_medikit', 16);
            $table->unsignedInteger('kategori_id');
            $table->unsignedInteger('supplier_id');
            $table->string('nama_medikit', 100);
            $table->string('thumbnail');
            $table->text('deskripsi');
            $table->decimal('harga', 19, 2);
            $table->decimal('harga_jual', 19, 2);
            $table->unsignedInteger('stok');
            $table->timestamps();

            $table->foreign('kategori_id')
                  ->references('id_kategori')
                  ->on('kategoris')
                  ->cascadeOnDelete();
            $table->foreign('supplier_id')
                  ->references('id_supplier')
                  ->on('suppliers')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medikits');
    }
};
