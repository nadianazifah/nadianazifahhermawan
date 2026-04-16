<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_resep');
            $table->text('deskripsi')->nullable();
            $table->string('foto_resep')->nullable();
            $table->string('jenis_resep'); 
            $table->text('bahan');
            $table->text('cara_masak');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};