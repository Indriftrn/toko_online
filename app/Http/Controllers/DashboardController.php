<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Pesanan;

class DashboardController extends Controller
{
	public function index()
	{
		$laba_kotor = $this->labaKotor();
		return view ('admin.dashboard.index',['laba_kotor'=>$laba_kotor]);
	}

	public function labaKotor()
	{
		$bulan = date('Y-m');
		$data['bulan'][] = date('M y',strtotime($bulan));
		$data['total'][] = Pesanan::where('status_pesanan','selesai')
							->where('tanggal_update','like',"{$bulan}%")
							->sum('total_harga');

		for($i=1;$i<=5;$i++){
			$bulan = date('Y-m', strtotime('-'.$i.' month'));
			$data['bulan'][] = date('M y',strtotime($bulan));
			$data['total'][] = Pesanan::where('status_pesanan','selesai')
						->where('tanggal_update','like',"{$bulan}%")
						->sum('total_harga');
		}
		return $data;
	}
}