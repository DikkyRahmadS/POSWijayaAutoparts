<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'pembelian_id',
        'produk_id',
        'harga_beli',
        'jumlah',
        'subtotal'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk');
    }
}
