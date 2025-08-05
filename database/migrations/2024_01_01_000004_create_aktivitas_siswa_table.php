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
        Schema::create('aktivitas_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa_data')->onDelete('cascade');
            $table->foreignId('aktivitas_id')->constrained('aktivitas')->onDelete('cascade');
            $table->enum('status', ['pending', 'selesai', 'ditinjau'])->default('pending')->comment('Status penyelesaian aktivitas');
            $table->text('catatan')->nullable()->comment('Catatan dari guru/admin');
            $table->timestamp('tanggal_selesai')->nullable()->comment('Tanggal penyelesaian aktivitas');
            $table->unsignedBigInteger('dinilai_oleh')->nullable();
            $table->timestamps();
            
            $table->unique(['siswa_id', 'aktivitas_id']);
            $table->index('status');
            $table->index('tanggal_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_siswa');
    }
};