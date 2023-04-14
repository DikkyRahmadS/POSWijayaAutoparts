<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;
    protected $table = 'pendapatans';
    protected $primaryKey = 'id';
    protected $fillable = ['id','penjualan_id', 'kode_produk', 'qty', 'harga_beli', 'harga_jual'];


}
