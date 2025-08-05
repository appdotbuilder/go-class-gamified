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
        Schema::create('siswa_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nis')->unique()->comment('Nomor Induk Siswa');
            $table->string('kelas')->comment('Kelas siswa');
            $table->integer('total_bintang')->default(0)->comment('Total bintang yang dimiliki');
            $table->integer('total_badge')->default(0)->comment('Total badge yang dimiliki');
            $table->unsignedBigInteger('current_level_id')->nullable();
            $table->timestamps();
            
            $table->index('nis');
            $table->index('kelas');
            $table->index(['total_bintang', 'total_badge']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_data');
    }
};