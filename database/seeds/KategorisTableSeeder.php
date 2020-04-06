<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
        	'nama_kategori' => 'Jaket',
        ]);

        Kategori::create([
        	'nama_kategori' => 'T-Shirt',
        ]);

        Kategori::create([
        	'nama_kategori' => 'Sepatu',
        ]);

        Kategori::create([
        	'nama_kategori' => 'Tas',
        ]);
    }
}
