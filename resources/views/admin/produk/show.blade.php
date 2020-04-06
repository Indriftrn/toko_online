@extends('admin.layout')
@section('title','Produk Tambah')
@section('content')
<h1 class="h2 border-bottom pt-3 pb-3">Produk</h1>

<div class="row">
	<div class="col-md-4">
		@if(!empty($row->file_gambar_produk))
		<img src="{{url('images/'.$row->file_gambar_produk)}}"
		class="img-fluid">
		@else
		<img src="{{url('images/noimage.png')}}"
		class="img-fluid">
		@endif
	</div>
	<div class="col-md-8">
		<h3 class="mb-3">{{$row->nama_produk}}</h3>
		<p>Harga : Rp {{number_format($row->harga_produk,0,',','.')}}</p>
		<p>Kategori : {{$row->kategori->nama_kategori}}</p>
		<p>Deskripsi : <br><br>
		<?= nl2br($row->deskripsi_produk) ?>
		</p>
		<p>
			<a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">
				<i class="fas fa-arrow-left"></i> Kembali
			</a>
			<a href="{{ route('produk.edit',['produk'=>$row->id]) }}" class="btn btn-warning">
				<i class="fas fa-edit"></i> Edit
			</a>
		</p>
	</div>
</div>
@endsection