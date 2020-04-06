<?php

use Illuminate\Database\Seeder;
use App\Pesanan;

class PesanansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pesanan::class, 100)->create();
    }
}
