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
        Schema::create('siswa_badges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa_data')->onDelete('cascade');
            $table->foreignId('badge_definition_id')->constrained('badge_definitions')->onDelete('cascade');
            $table->date('tanggal_didapat')->comment('Tanggal mendapatkan badge');
            $table->unsignedBigInteger('diberikan_oleh');
            $table->text('catatan')->nullable()->comment('Catatan pemberian badge');
            $table->timestamps();
            
            $table->unique(['siswa_id', 'badge_definition_id']);
            $table->index('tanggal_didapat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_badges');
    }
};