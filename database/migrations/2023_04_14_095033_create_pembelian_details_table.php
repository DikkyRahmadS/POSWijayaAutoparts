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
        Schema::create('pembelian_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembelian_id')->nullable();
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->integer("harga_beli");
            $table->integer("jumlah");
            $table->integer("subtotal");
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->foreign('pembelian_id')->references('id')->on('pembelians');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_details');
    }
};
