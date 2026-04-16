<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cake_books', function (Blueprint $table) {
            $table->id();
            $table->string('nama_buku');
            $table->text('deskripsi')->nullable();
            $table->string('foto_sampul')->nullable();
            $table->string('file_pdf'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cake_books');
    }
};