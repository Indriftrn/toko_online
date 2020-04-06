<?php

use Illuminate\Database\Seeder;
use App\Produk;

class ProduksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Produk::class, 50)->create();
    }
}
