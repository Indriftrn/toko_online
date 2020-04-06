@extends('admin.layout')
@section('title','Produk')
@section('content')
<h1 class="h2 border-bottom pt-3 pb-3">Produk</h1>

@if (session('store'))
<div class="alert alert-success alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">
		<span>&times;</span>
	</button>
	<strong>Success !</strong> {{ session('store')}}.
</div>
@endif

@if(session('update'))
<div class="alert alert-success alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">
		<span>&times;</span>
	</button>
	<strong>Success !</strong> {{ session('update')}}.
</div>
@endif

@if(session('destroy'))
<div class="alert alert-success alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">
		<span>&times;</span>
	</button>
	<strong>Success !</strong> {{ session('destroy')}}.
</div>
@endif

<div class="row">
	<div class="col-md-6 mb-3">
		<a class="btn btn-primary" 
		href="{{ route('produk.create')}}">[+] Buat Baru</a>
	</div>
	<div class="col-md-6 mb-3">
		<form method="GET" action="?">
			<div class="input-group">
				<input type="text" name="keyword" class="form-control
				border-secondary " placeholder="cari..."
				value="{{ request()->keyword }}">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary text-primary" type="submit">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

<table class="table">
	<thead>
		<th>Produk</th><th>&nbsp;</th>
	</thead>
	<tbody>
		@foreach($data as $row)
		<tr>
			<td>
				<img src="{{url('images/'.$row->file_gambar_produk)}}"
				width="100" class="img-thumbnail mr-1"
				align="left">
				<a href="{{route('produk.show',['produk'=>$row->id])}}"
					class="font-weight-normal">
						{{ $row->nama_produk }}
					</a> <br>
					Harga : Rp {{ number_format($row->harga_produk,0,',','.') }}<br>
					Kategori : {{ $row->kategori->nama_kategori }}
			</td>
			<td>
				<a class="btn btn-sm btn-warning"
				href="{{ route('produk.edit',['produk'=>$row->id]) }}">
					<i class="fas fa-edit"></i>
				</a>
				<button class="btn btn-sm btn-danger tombol-hapus"
				type="button"
				data-url="{{ route('produk.destroy',['produk'=>$row->id]) }}">
					<i class="fas fa-trash-alt"></i>
				</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<p>
	Jumlah : {{ $data->total() }}
</p>

@if( !empty(request()->keyword) )

{{
$data->appends(['keyword'=>request()->keyword])
	->links('vendor.pagination.bootstrap-4')
}}

@else

{{ $data->links('vendor.pagination.bootstrap-4') }}

@endif

@endsection

@push('modal')
<div class="modal fade" tabindex="-1" id="modalHapus">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					<i class="fas fa-trash-alt"></i>Hapus</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<p>Apakah yakin akan dihapus?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<form method="post" action="#">
					@method('DELETE')
					@csrf
					<button type="submit" class="btn btn-primary">Ya, Hapus!</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endpush

@push('js')
<script>
	$(function(){
		$('.tombol-hapus').click(function(){
			var url = $(this).attr('data-url');
			$("#modalHapus form").attr('action',url);
			$('#modalHapus').modal('show');
		});
	});
</script>
@endpush
