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
        Schema::create('kontestans', function (Blueprint $table) {
            $table->id();
            $table->string('tahun')->nullable();
            $table->string('nama')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('vote')->nullable();
            $table->text('visi')->nullable(); // Menambahkan kolom visi
            $table->text('misi')->nullable(); // Menambahkan kolom misi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontestans');
    }
};
