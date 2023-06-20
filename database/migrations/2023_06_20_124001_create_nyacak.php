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
        Schema::create('nyacak', function (Blueprint $table) {
            $table->id('id_nyacak');
            $table->string('nama_acara');
            $table->text('deskripsi');
            $table->text('id_seni');
            // $table->foreignId('id_seni')->references('id_seni')->on('seni')->nullable();
            // $table->foreignId('id_budaya')->references('id_budaya')->on('budaya');
            // $table->dateTime('mulai_acara');
            // $table->dateTime('akhir_acara');
            // $table->string('warna_acara', 7)->nullable();
            // $table->decimal('latitude', 10, 7)->nullable();
            // $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nyacak');
    }
};