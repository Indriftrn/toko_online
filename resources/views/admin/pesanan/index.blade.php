@extends('admin.layout')
@section('title','Pesanan')
@section('content')
<h1 class="h2 border-bottom pt-3 pb-3">Pesanan</h1>

@if(session('update'))
<div class="alert alert-success alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">
		<span>&times;</span>
	</button>
	<strong>Success !</strong> {{ session('update') }}.
</div>
@endif

<ul class="nav nav-tabs mb-3">
	<li class="nav-item">
		<a class="nav-link {{ request()->status == '' ? 'active':'' }}"
		href="?">Semua </a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ request()->status == 'belum_bayar' ? 'active':'' }}"
		href="?status=belum_bayar">Belum Bayar </a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ request()->status == 'lunas' ? 'active':'' }}"
		href="?status=lunas">Perlu Dikirim </a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ request()->status == 'dikirim' ? 'active':'' }}"
		href="?status=dikirim">Dikirim </a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ request()->status == 'selesai' ? 'active':'' }}"
		href="?status=selesai">Selesai </a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ request()->status == 'batal' ? 'active':'' }}"
		href="?status=batal">Dibatalkan </a>
	</li>
</ul>

@foreach($data as $row)
<div class="row mb-2">
	<div class="col-6">
		<i class="fas fa-user"></i> {{$row->nama_pelanggan}}
	</div>
	<div class="col-6 text-right text-muted">
		<small>
			{{date('d M Y H:i:s',strtotime($row->tanggal_pesan))}} /
			{{date('d M Y H:i:s',strtotime($row->tanggal_update))}}
		</small>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<img src="{{url('images/'.$row->produk->file_gambar_produk)}}"
		width="100" class="img-thumbnail mr-1"
		align="left">
		<strong>{{ $row->produk->nama_produk }}</strong> <br>
		Kategori : {{ $row->produk->kategori->nama_kategori }} <br>
		Jumlah : {{ $row->jumlah }}
	</div>
	<div class="col-3 text-success">
		<strong>Rp. {{ number_format($row->total_harga,0,',','.') }}</strong>
	</div>
	<div class="col-3">
		{{ ucwords(str_replace('_',' ' ,$row->status_pesanan)) }}
	</div>
	<div class="col-2 text-right">
		<a href="{{ route('pesanan.edit',['pesanan'=>$row->id]) }}"
		class="btn btn-warning">Lihat Rincian</a>
	</div>
</div>
<hr>
@endforeach

<p>
Jumlah : {{ $data->total() }}
</p>

@if( !empty(request()->status ) )

{{
$data->appends(['status'=>request()->status])
  ->links('vendor.pagination.bootstrap-4')
}} 

@else

{{ $data->links('vendor.pagination.bootstrap-4') }}

@endif

@endsection