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
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->comment('Nama aktivitas');
            $table->text('deskripsi')->nullable()->comment('Deskripsi aktivitas');
            $table->date('tanggal')->comment('Tanggal aktivitas');
            $table->integer('bintang_reward')->default(0)->comment('Jumlah bintang reward');
            $table->integer('badge_reward')->default(0)->comment('Jumlah badge reward');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->comment('Status aktivitas');
            $table->timestamps();
            
            $table->index('tanggal');
            $table->index('status');
            $table->index(['bintang_reward', 'badge_reward']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas');
    }
};