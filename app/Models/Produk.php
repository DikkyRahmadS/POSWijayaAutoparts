<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_produk', 'nama_produk', 'merk', 'berat', 'harga_jual', 'image', 'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }
}
