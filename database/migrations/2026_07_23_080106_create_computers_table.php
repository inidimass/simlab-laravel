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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('laboratory_id')->constrained()->cascadeOnDelete();

            $table->string('kode_pc')->unique();

            $table->text('spesifikasi')->nullable();

            $table->enum('status', [
                'aktif',
                'rusak',
                'maintenance',
            ])->default('aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
