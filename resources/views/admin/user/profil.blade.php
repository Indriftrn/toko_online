@extends('admin.layout')
@section('title','Profil')
@section('content')
<h1 class="h2 border-bottom pt-3 pb-3">Profil</h1>

@if(session('update'))
<div class="alert alert-success alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">
		<span>&times;</span>
	</button>
	<strong>Success !</strong> {{ session('update')}}.
</div>
@endif

<div class="row">
	<div class="col-md-6 offset-md-3">
		<form method="POST" action="{{ route('user.profil.update')}}">
			@csrf
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label>Nama Pengguna</label>
						<input type="text" name="nama"
						value="{{ old('nama',$row->name) }}"
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
						value="{{ old('email',$row->email) }}"
						class="form-control @error('email') is-invalid @enderror">
						@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="text" name="password"
						class="form-control @error('password') is-invalid @enderror">
						@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
						<div class="text-muted">
							Abaikan apabila tidak ingin mengganti Password
						</div>
					</div>

					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="password_confirmation" class="form-control">
					</div>

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">
						<i class="fas fa-save"></i> Update
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection