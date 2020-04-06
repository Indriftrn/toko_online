@extends('admin.layout')
@section('title','Produk Tambah')
@section('content')
<h1 class="h2 border-bottom pt-3 pb-3">Produk</h1>

<form method="POST" action="{{ route('produk.update',['produk'=>$row->id]) }}"
enctype="multipart/form-data">

			@csrf
			@method('PUT')

			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Edit</h5>
				</div>

				<div class="card-body">
					<div class="row">

						<div class="col-md-6">
							
							<div class="form-group">
								<label>Nama Produk</label>
								<input type="text" name="nama_produk" 
								value="{{ old('nama_produk',$row->nama_produk) }}" 
								class="form-control @error('nama_produk') is-invalid @enderror">
								@error('nama_produk')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div><!-- ./form-group -->
					
							<div class="row">
								<div class="col-md-4">
									<img src="{{ url('images/'.$row->file_gambar_produk)}}"
									class="img-thumbnail img-fluid mr-3"
									id="preview">
								</div>
								<div class="col-md-8">

									<div class="form-group">
										<div class="custom-file">
											<input type="file" name="gambar"
											class="custom-file-input @error('gambar') is-invalid 
											@enderror"
											id="inputGambar">
											<label class="custom-file-label"
											for="inputGambar">Pilih Gambar</label>
											@error('gambar')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
											<div class="text-muted">
												Abaikan apabila tidak ingin mengganti gambar
											</div>
										</div>
									</div><!-- ./form-group -->

									<div class="form-group">
										<label>Kategori</label>
										<?php
											$value=old('kategori',$row->id_kategori);
										?>
										<select name="kategori"
										class="form-control @error('kategori') is-invalid @enderror">
											<option>Pilih : </option>
											@foreach(
												\App\Kategori::orderBy('nama_kategori','asc')->get() as $kategori)
											<option value="{{$kategori->id}}"
												{{ $value == $kategori->id ? 'selected' : ''}}>
												{{$kategori->nama_kategori}}
											</option>
											@endforeach
										</select>
										@error('kategori')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div><!-- ./form-group -->

									<div class="form-group">
										<label>Harga</label>
										<input type="number" name="harga" 
										value="{{ old('harga',$row->harga_produk) }}"
										class="form-control @error('harga') is-invalid @enderror">
										@error('harga')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div><!-- ./form-group -->

								</div><!-- ./col-md-8 -->
							</div><!-- ./row -->

						</div><!-- ./col-md-6 -->

						<div class="col-md-6">
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea name="deskripsi"
								class="form-control @error('deskripsi') is-invalid @enderror"
								rows="10">{{ old('deskripsi',$row->deskripsi_produk) }}</textarea>
								@error('deskripsi')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div><!-- ./form-group -->
						</div>

					</div><!-- ./row -->

				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Update
					</button>
					<a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">
						Cancel
					</a>
				</div>
			</div>
		</form>
@endsection

@push('js')
<script type="text/javascript">

function filePreview(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#preview').attr('src',e.target.result)
		}
		reader.readAsDataURL(input.files[0]);
	}
}

$(function(){
	$("#inputGambar").change(function () {
		filePreview(this);
	});
});

</script>
@endpush


						
