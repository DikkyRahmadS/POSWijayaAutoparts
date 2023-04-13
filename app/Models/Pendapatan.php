<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;
    protected $table = 'pendapatans';
    protected $primaryKey = 'id';
    protected $fillable = ['Tanggal','Nama Produk', 'Jumlah', 'Harga Asli Produk', 'Harga Jual'];

    public function riwayat_penjualans()
    {
        return $this->hasMany(RiwayatPenjualan::class);
    }
}
