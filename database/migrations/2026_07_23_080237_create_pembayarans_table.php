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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pendaftaran_id')->constrained()->cascadeOnDelete();

            $table->decimal('total_bayar', 12, 2);

            $table->string('bukti_pembayaran');

            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Ditolak',
            ])->default('Menunggu');

            $table->date('tanggal_bayar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
