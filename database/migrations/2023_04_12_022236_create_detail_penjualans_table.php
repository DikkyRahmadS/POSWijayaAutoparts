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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('kode_produk');
            $table->unsignedBigInteger('penjualan_id');
            $table->integer('qty');
            $table->foreign('kode_produk')->references('id')->on('produks');
            $table->foreign('penjualan_id')->references('id')->on('riwayat_penjualans')->onDelete('cascade');
            $table->primary(['kode_produk', 'penjualan_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
