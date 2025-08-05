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
        Schema::create('pelanggaran_jenis', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->comment('Jenis pelanggaran');
            $table->text('deskripsi')->nullable()->comment('Deskripsi pelanggaran');
            $table->integer('pengurang_bintang')->default(0)->comment('Jumlah bintang yang dikurangi');
            $table->integer('pengurang_badge')->default(0)->comment('Jumlah badge yang dikurangi');
            $table->enum('tingkat', ['ringan', 'sedang', 'berat'])->default('ringan')->comment('Tingkat pelanggaran');
            $table->timestamps();
            
            $table->index('tingkat');
            $table->index(['pengurang_bintang', 'pengurang_badge']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggaran_jenis');
    }
};