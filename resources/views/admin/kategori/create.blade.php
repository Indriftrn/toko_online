@extends('admin.layout')
@section('title','Kategori Tambah')
@section('content')
<h1 class="h2 border-bottom pt-3 pb-3">Kategori</h1>
<div class="row">
	<div class="col-md-6 offset-md-3">

		<form method="POST" action="{{ route('kategori.store') }}">

			@csrf

			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Tambah</h5>
				</div>

				<div class="card-body">
					<div class="form-group"></div>
						<label>Nama Kategori</label>
						<input type="text" name="nama_kategori" 
						value="{{ old('nama_kategori') }}" 
						class="form-control @error('nama_kategori') is-invalid @enderror">
						@error('nama_kategori')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan
					</button>
					<a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection