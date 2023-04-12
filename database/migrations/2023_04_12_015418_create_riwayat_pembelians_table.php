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
        Schema::create('riwayat_pembelians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_produk');
            $table->date('tanggal_supply');
            $table->integer('harga_beli');
            $table->integer('jumlah');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('kode_produk')->references('id')->on('produks');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembelians');
    }
};
