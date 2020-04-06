@extends('guest.app')
@section('title',$row->nama_produk)
@section('content')
<div class="container-fluid">
	<div class="row mt-3">
		<!-- Gambar Produk -->
		<div class="col-sm-4">
			<img src="{{url('images/'.$row->file_gambar_produk)}}" class="d-block w-100 img-fluid">
		</div>

		<!-- Keterangan Produk -->
		<div class="col-sm-8 mb-5">
			<h1>{{$row->nama_produk}}</h1>
			<h2 class="text-danger my-3"><small>Rp</small>
				{{ number_format($row->harga_produk,0,',','.')}}
			</h2>
			<p> Kategori : <a href="{{route('kategori',['kategori'=>$row->id_kategori])}}">
			{{$row->kategori->nama_kategori}}</a></p>
			<a class="btn btn-warning" href="{{route('pesan',['pesan'=>$row->id])}}">Beli Sekarang</a>
			<p><h4>Deskripsi</h4>
			<hr>
			<?= nl2br($row->deskripsi_produk) ?>
			</p>
		</div>
	</div>
</div>
@endsection

	