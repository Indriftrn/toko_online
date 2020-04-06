<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_produk');
            $table->string('nama_pelanggan', 190);
            $table->string('no_hp_pelanggan', 190);
            $table->mediumText('alamat_pelanggan', 190);
            $table->integer('jumlah');
            $table->bigInteger('total_harga');
            $table->enum('status_pesanan', [
                            'belum_bayar',
                            'lunas',
                            'dikirim',
                            'selesai',
                            'batal'
                            ])->default('belum_bayar');
            $table->dateTime('tanggal_pesan');
            $table->dateTime('tanggal_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
