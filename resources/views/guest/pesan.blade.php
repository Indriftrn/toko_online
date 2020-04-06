@extends('guest.app')
@section('title',$row->nama_produk)
@section('content')
<div class="container-fluid">
	<div class="row mt-3">
		<!--Gambar Produk-->
		<div class="col-sm-4">
			<img src="{{url('images/'.$row->file_gambar_produk)}}"
			class="d-block w-100 img-fluid">
		</div>

		<!--keterangan Produk-->
		<div class="col-sm-8 mb-5">
			<h1>{{$row->nama_produk}}</h1>
			<h2 class="text-danger my-3"><small>Rp</small>
				{{ number_format($row->harga_produk,0,',','.') }}
			</h2>
			<p> Kategori : <a href="{{route('kategori',['kategori'=>$row->id_kategori])}}">
				{{$row->kategori->nama_kategori}} </a> </p>
			<p>
				<div class="card">
			<div class="card-header">
				Formulir Pemesanan
			</div>
			<div class="card-body">
				<p>
					<small class="form-text text-muted">
						Untuk memesan Produk ini, Silahkan isi formulir dibawah ini dengan lengkap.
					</small>
				</p>
				<form method="post"action="{{route('pesan',['produk'=>$row->id])}}">
				@csrf
				<!-- Input di sembunyikan id dan nama produk -->
				<div class="form-group row">
				<label for="inputJumlah" class="col-sm-3 col-form-label">Jumlah</label>
				<div class="col-sm-4">
					<input type="number" name="jumlah"
					value="{{old('jumlah',1)}}"
					class="form-control @error('jumlah') is-invalid @enderror"
					id="inputJumlah" placeholder="jumlah" required>
					@error('jumlah')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="inputNama" class="col-sm-3 col-form-label">Nama Lengkap</label>
				<div class="col-sm-6">
					<input type="text" name="nama"
					value="{{old('nama')}}"
					class="form-control @error('nama') is-invalid @enderror"
					id="inputNama" placeholder="Nama Lengkap" required>
					@error('nama')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="inputPhone" class="col-sm-3 col-form-label">Nomor HP/WA</label>
				<div class="col-sm-4">
					<input type="number" name="phone"
					value="{{old('phone')}}"
					class="form-control @error('phone') is-invalid @enderror"
					id="inputPhone" placeholder="Nomor HP" required>
					@error('phone')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="inputAlamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
				<div class="col-sm-6">
				<textarea name="alamat"
				class="form-control @error('alamat') is-invalid @enderror" required>{{old('alamat')}}</textarea>
				@error('alamat')
				<div class="invalid-feedback">
						{{ $message }}
					</div><br>
					@enderror
					<small class="form-text text-muted">
					Alamat harus lengkap, beserta dengan kode pos. <br>
					Contoh : Dusun Sukahurip, Rt 01/01, Desa Sukasari, Kecamatan Banjarsari, Kabupaten Ciamis, Provinsi Jawa Barat, Kode Pos 46383
					</small>
				</div>
			</div>

					<div class="form-group row">
						<div class="offset-sm-3 col-sm-9">
							<button class="btn btn-primary" type="submit">Submit Pesanan</button>
						</div>
					</div>


					</form>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
