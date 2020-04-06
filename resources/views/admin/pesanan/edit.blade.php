@extends('admin.layout')
@section('title.Pesanan')
@section('content')
<h1 class="h2 border-bottom pt-3 pb-3">Pesanan</h1>

<div class="row">
	<div class="col-md-4">
		@if(!empty($row->produk->file_gambar_produk))
		<img src="{{url('images/'.$row->produk->file_gambar_produk)}}"
		class="img-fluid">
		@else
		<img src="{{url('images/noimage.png')}}"
		class="img-fluid">
		@endif
	</div>
	<div class="col-md-8">
		<h3 class="mb-3">{{$row->produk->nama_produk}}</h3>
		<p>Kategori : {{$row->produk->kategori->nama_kategori}}</p>
		<p>Jumlah : {{$row->jumlah}}</p>
		<p>Total Bayar : Rp {{number_format($row->total_harga,0,',','.')}}</p>
		@if($row->status_pesanan == 'batal')
		<p>Status : Dibatalkan</p>
		@elseif($row->status_pesanan == 'selesai')
		<p>Status : Telah Selesai</p>
		<p>Tanggal Pesan/Update :
			<small class="text-muted">
				{{date('d M Y H:i:s',strtotime($row->tanggal_pesan))}} /
				{{date('d M Y H:i:s',strtotime($row->tanggal_update))}}
			</small>
		</p>
		@else
		<p>
			<form class="form-group row" method="POST"
			action="{{ route('pesanan.update',['pesanan'=>$row->id]) }}" >
				
			@csrf
			@method('PUT')

				<?php
					$status_row = $row->status_pesanan;
					$list = [];

					if($status_row == 'belum_bayar') {
						$list = [
							['status'=>'belum_bayar','label'=>'Belum Bayar'],
							['status'=>'lunas','label'=>'Lunas'],
							['status'=>'batal','label'=>'Batalkan'],
						];
					}

					if($status_row == 'lunas') {
						$list = [
							['status'=>'lunas','label'=>'Lunas'],
							['status'=>'dikirim','label'=>'Dikirim'],
							['status'=>'batal','label'=>'Batalkan'],
						];
					}

					if($status_row == 'dikirim') {
						$list = [
							['status'=>'dikirim','label'=>'Dikirim'],
							['status'=>'selesai','label'=>'Selesai'],
							['status'=>'batal','label'=>'Batalkan'],
						];
					}

					$status = old('status',$row->status_pesanan);
				?>

				<div class="input-group col-6">
					<div class="input-group-prepend">
						<div class="input-group-text">Status</div>
					</div>
					<select name="status"
					 class="form-control @error('status') is-invalid @enderror">
					   <option value="">Pilih : </option>
					   @foreach($list as $option)
					   <option value="{{$option['status']}}"
					   {{ $status == $option['status'] ? 'selected' : ''}}>{{$option['label']}}</option>
					   @endforeach					
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit">Update</button>
					</div>
					@error('status')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
			</form>
		</p>
		@endif
		<h4>Data Pemesan</h4>
		<hr>
		<p>
			Nama : <strong>{{ $row->nama_pelanggan }}</strong>
		</p>
		<p>
			Nomor Hp : {{ $row->no_hp_pelanggan }}
		</p>
		<p>
			Alamat : {{ $row->alamat_pelanggan }}
		</p>
		<p>
			<a href="{{ route('pesanan.index') }}" class="btn btn-outline-secondary">
				<i class="fas fa-arrow-left"></i> Kembali
			</a>

		</p>
	</div>
</div>

@endsection
