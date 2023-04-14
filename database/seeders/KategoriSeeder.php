<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = [
            [
                "nama_kategori" => "Bahan Dinamo Stater",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Mangkokan",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Piston Switch",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Oil Seal",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Cover Alt",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Cover Str",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "SIKU",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Solonoid/SS",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Holder",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Kolektor",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Bantalan",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Carbon Brush Alt/ Kol Besar Alt",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Dinamo Stater",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Bahan Dinamo Alternator",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Pulley",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Ic",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Bendix",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ],
            [
                "nama_kategori" => "Rectifier/Silikon",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time()),
            ]
        ];
        Kategori::insert($datas);
    }
}
