@extends('admin.layout')
@section('title','Pengguna Tambah')
@section('content')
<h1 class ="h2 border-bottom pt-3 pb-3">Pengguna</h1>
<div class="row">
	<div class="col-md-6 offset-md-3">

		<form method="POST" action="{{ route('user.store') }}" >

			@csrf

			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Tambah</h5>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Nama Pengguna</label>
						<input type="text" name="nama"
						value="{{ old('nama') }}"
						class="form-control @error('nama') is-invalid @enderror">
						@error('nama')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
							@enderror
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email"
						value="{{ old('email') }}"
						class="form-control @error('email') is-invalid @enderror">
						@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password"
						class="form-control @error('password') is-invalid @enderror">
						@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="password_confirmation" class="form-control">
					</div>

				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-primary">
						<i class="fas fa-save"></i> Simpan
					</button>
					<a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
						Cancel
					</a>
				</div>

			</div>
		</form>
	</div>
</div>
@endsection