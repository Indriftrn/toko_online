<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pesanan;
use Faker\Generator as Faker;

$factory->define(Pesanan::class, function (Faker $faker) {
	
	$tanggal = $faker->dateTimeBetween(
					$startDate = '-6 months', 
					$endDate = 'now',
					$timezone = 'Asia/Jakarta'
				);
    return [
        'id_produk'=>rand(1,10),
        'nama_pelanggan'=>$faker->name,
        'no_hp_pelanggan'=>$faker->e164PhoneNumber,
        'alamat_pelanggan'=>$faker->address,
        'jumlah'=>rand(1,5),
        'total_harga'=>$faker->numberBetween($min = 40000, $max = 550000),
        'status_pesanan'=> 'selesai',
        'tanggal_pesan'=>$tanggal,
        'tanggal_update'=>$tanggal,
    ];
});
