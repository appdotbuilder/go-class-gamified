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
        Schema::create('badge_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->comment('Nama badge');
            $table->text('deskripsi')->nullable()->comment('Deskripsi badge');
            $table->string('icon')->nullable()->comment('Icon badge');
            $table->string('color')->default('#F59E0B')->comment('Warna badge');
            $table->enum('kategori', ['prestasi', 'perilaku', 'kehadiran', 'tugas', 'lainnya'])->default('prestasi')->comment('Kategori badge');
            $table->timestamps();
            
            $table->index('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_definitions');
    }
};