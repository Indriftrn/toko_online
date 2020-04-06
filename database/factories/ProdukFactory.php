<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produk;
use Faker\Generator as Faker;

$factory->define(Produk::class, function (Faker $faker) {
    return [
       'id_kategori'=>rand(1,4),
       'nama_produk'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
       'harga_produk'=>$faker->numberBetween($min = 40000, $max = 150000),
       'file_gambar_produk'=>'noimage.png',
       'deskripsi_produk'=>$faker->text($maxNbChars = 500),
    ];
});
