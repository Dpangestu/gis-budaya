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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->string('nama_acara');
            $table->text('deskripsi');
            $table->foreignId('id_seni')->nullable()->references('id_seni')->on('seni');
            $table->foreignId('id_budaya')->nullable()->references('id_budaya')->on('budaya');
            $table->dateTime('mulai_acara');
            $table->dateTime('akhir_acara');
            $table->string('warna_acara', 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};