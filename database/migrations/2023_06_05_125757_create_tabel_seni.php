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
        Schema::create('seni', function (Blueprint $table) {
            $table->id('id_seni')->unsigned()->length(16);
            $table->string('nama_seni', 30);
            $table->text('deskripsi');
            $table->string('pengelola', 60)->nullable();
            $table->string('kategori', 20)->nullable();
            $table->string('foto', 20)->nullable();
            $table->Integer('htm')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seni');
    }
};