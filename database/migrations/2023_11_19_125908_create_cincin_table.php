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
        Schema::create('cincin', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('harga'); // Tambahkan kolom harga
            $table->foreignId('jenisbarang_id')->constrained('jenisbarang'); // Tambahkan kolom jenisbarang_id
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cincin');
    }
};
