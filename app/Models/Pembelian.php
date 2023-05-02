<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_item',
        'total_harga',
        'diskon',
        'bayar',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }
}
