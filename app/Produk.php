<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'id_kategori','nama_produk','harga_produk','file_gambar_produk','deskripsi_produk'
    ];

    public function kategori()
    {
    	return $this->belongsTo('App\Kategori','id_kategori');
    }
}
