<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;
use App\Pesanan;

class GuestController extends Controller
{
	public function index()
	{
		return view('guest.index');
	}

	public function about()
	{
		return view('guest.about');
	}

	public function detail(Produk $produk)
	{
		return view('guest.detail',['row'=>$produk]);
	}

	public function kategori(Kategori $kategori)
	{
		$data = Produk::where('id_kategori',$kategori->id)
				->orderBy('nama_produk','asc')->paginate(12);

		return view('guest.kategori',['data'=>$data,'kategori'=>$kategori]);
	}

	public function search(Request $request)
	{
		$data = Produk::where('nama_produk','like',"%{$request->keyword}%")
				->orderBy('nama_produk','asc')->paginate(12);

		return view('guest.search',['data'=>$data]);
	}

	public function pesan(Produk $produk)
	{
		return view('guest.pesan',['row'=>$produk]);
	}

	public function pesanStore(Request $request, Produk $produk)
	{
		$request->validate([
			'jumlah'=>'required|min:1|numeric',
			'nama'=>'required|min:3',
			'phone'=>'required|numeric|min:10',
			'alamat'=>'required|min:10',
		]);

		$jumlah_harga = $request->jumlah * $produk->harga_produk;

		Pesanan::create([
			'id_produk'=>$produk->id,
			'nama_pelanggan'=>$request->nama,
			'no_hp_pelanggan'=>$request->phone,
			'alamat_pelanggan'=>$request->alamat,
			'jumlah'=>$request->jumlah,
			'total_harga'=>$jumlah_harga,
		]);

		return redirect()->route('notif');
	}

	public function notif()
	{
		return view('guest.notif');
	}
}

