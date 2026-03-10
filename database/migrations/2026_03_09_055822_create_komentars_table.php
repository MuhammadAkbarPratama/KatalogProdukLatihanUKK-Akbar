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
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel users (siapa yang komentar)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Menghubungkan ke tabel produks (produk mana yang dikomentari)
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            
            // Isi komentar
            $table->text('isi_komentar'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};