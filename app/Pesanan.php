<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    const CREATED_AT = 'tanggal_pesan';
    const UPDATED_AT = 'tanggal_update';

    protected $fillable = [
    	'id_produk','nama_pelanggan','no_hp_pelanggan','alamat_pelanggan','jumlah','total_harga','status_pesanan'
    ];

    public function produk()
    {
       return $this->belongsTo('App\Produk','id_produk');
       
    }

}
