<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nomer_seri')->unique();
            $table->string('tahun');
            $table->string('nama_barang');
            $table->string('keterangan');
            $table->unsignedBigInteger('kodeBarang_id');
            $table->unsignedBigInteger('type_id');  // Pastikan tipe data sesuai
            $table->unsignedBigInteger('lokasi_id');  // Pastikan tipe data sesuai
            $table->enum('status_barang', ['ada','tidak']);
            $table->enum('kondisi', ['baik', 'rusak']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
