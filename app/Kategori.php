<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'nama_kategori',
    ];
}
