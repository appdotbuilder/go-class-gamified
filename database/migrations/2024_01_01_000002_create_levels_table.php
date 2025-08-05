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
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->comment('Nama level');
            $table->integer('min_bintang')->comment('Minimal bintang untuk mencapai level ini');
            $table->integer('min_badge')->default(0)->comment('Minimal badge untuk mencapai level ini');
            $table->text('deskripsi')->nullable()->comment('Deskripsi level');
            $table->string('icon')->nullable()->comment('Icon untuk level');
            $table->string('color')->default('#3B82F6')->comment('Warna untuk level');
            $table->timestamps();
            
            $table->index('min_bintang');
            $table->index('min_badge');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};