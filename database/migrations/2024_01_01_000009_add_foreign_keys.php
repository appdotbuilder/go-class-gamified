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
        Schema::table('siswa_data', function (Blueprint $table) {
            $table->foreign('current_level_id')->references('id')->on('levels')->nullOnDelete();
        });

        Schema::table('aktivitas_siswa', function (Blueprint $table) {
            $table->foreign('dinilai_oleh')->references('id')->on('users')->nullOnDelete();
        });

        Schema::table('pelanggaran_siswa', function (Blueprint $table) {
            $table->foreign('guru_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('siswa_badges', function (Blueprint $table) {
            $table->foreign('diberikan_oleh')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswa_data', function (Blueprint $table) {
            $table->dropForeign(['current_level_id']);
        });

        Schema::table('aktivitas_siswa', function (Blueprint $table) {
            $table->dropForeign(['dinilai_oleh']);
        });

        Schema::table('pelanggaran_siswa', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
        });

        Schema::table('siswa_badges', function (Blueprint $table) {
            $table->dropForeign(['diberikan_oleh']);
        });
    }
};