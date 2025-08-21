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
            ["nama_kategori" => "Karpet Sapi", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["nama_kategori" => "Vulkanisir", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["nama_kategori" => "Outsol Simplex", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["nama_kategori" => "Vulkanisir Panas", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["nama_kategori" => "Vulkanisir Dingin", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["nama_kategori" => "Karpet Bak", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["nama_kategori" => "Rubber Sheet", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["nama_kategori" => "Sol Sandal Gunung", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())]
        ];
        Kategori::insert($datas);
    }
}
