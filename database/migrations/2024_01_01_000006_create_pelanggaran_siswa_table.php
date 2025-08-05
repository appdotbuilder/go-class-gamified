<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelanggaran_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa_data')->onDelete('cascade');
            $table->foreignId('pelanggaran_jenis_id')->constrained('pelanggaran_jenis')->onDelete('cascade');
            $table->date('tanggal')->comment('Tanggal pelanggaran');
            $table->unsignedBigInteger('guru_id');
            $table->text('catatan')->nullable()->comment('Catatan tambahan');
            $table->timestamps();
            
            $table->index('tanggal');
            $table->index(['siswa_id', 'tanggal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggaran_siswa');
    }
};