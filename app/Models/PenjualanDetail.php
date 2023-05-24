<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;
    protected $table = 'penjualan_details';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }

    public function penjualan()
    {
        return $this->belongsTo('App\Models\Penjualan');
    }

    public function barang()
    {
        return $this->belongsTo('App\Models\Produk');
    }    
}
