@extends('admin.layout')
@section('title','Kategori Edit')
@section('content')
<h1 class="h2 border-bottom pt-3 pb-3">Kategori</h1>
<div class="row">
	<div class="col-md-6 offset-md-3">

		<form method="POST" action="{{ route('kategori.update',['kategori'=>$row->id]) }}">

			@csrf
			@method('PUT')

			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Edit</h5>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Nama Kategori</label>
						<input type="text" name="nama_kategori" 
						value="{{ old('nama_kategori',$row->nama_kategori) }}" 
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
						<i class="fas fa-save"></i> Update
					</button>
					<a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary">
						Cancel
					</a>
				</div>

			</div>

		</form>

	</div>
</div>
@endsection