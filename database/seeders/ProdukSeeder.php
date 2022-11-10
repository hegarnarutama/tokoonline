<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'nama' => 'Abon',
            'harga' => 10000,
            'deskripsi' => 'Abon Makanan',
            'kategori' => 'makanan',
            'stok' => 10,
            'berat' => 200,
            'gambar' => '775260138WhatsApp Image 2022-10-28 at 21.27.10.jpeg'
        ]);

    }
}
