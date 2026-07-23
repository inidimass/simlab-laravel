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
        Schema::create('kelas_praktikums', function (Blueprint $table) {
            $table->id();

            $table->foreignId('praktikum_id')->constrained()->cascadeOnDelete();

            $table->foreignId('dosen_id')->constrained()->cascadeOnDelete();

            $table->foreignId('laboratory_id')->constrained()->cascadeOnDelete();

            $table->string('nama_kelas');

            $table->unsignedInteger('kuota');
            $table->unsignedInteger('kuota_terisi')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_praktikums');
    }
};
