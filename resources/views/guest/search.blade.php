@extends('guest.app')
@section('title', request()->keyword)
@section('content')
<div class="container-fluid">
	<!-- Produk -->
	<p class="mt-3">Pencarian dengan kata kunci <strong>{{ request()->keyword }}</strong></p>
	<hr>
	<div class="row">
		@foreach($data as $row)
		    	<!-- item produk -->
    	<div class="col-md-4">
    		<div class="card mb-3 shadow-sm">
    			<div class="row no-gutters">
    				<div class="col-4">
    					<img 
                        src="{{url('images/'.$row->file_gambar_produk)}}" 
                        class="img-fluid m-1">
    				</div>
    				<div class="col">
    					<div class="card-body">
    						<p class="card-text">
    							<a href="{{route('detail',['produk'=>$row->id])}}">
                                {{$row->nama_produk}}</a><br>
    							<span class="text-danger"><small>Rp</small>
                                {{number_format($row->harga_produk,0,',','.')}}
                                </span>
                                <br>
                                <a class="btn btn-warning btn-sm" href="{{route('pesan',['produk'=>$row->id])}}"> Beli Sekarang</a>
                            </p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div><!-- End Item Produk -->
	@endforeach
	<div><!-- End Produk -->
	<div class="row">
		<div class="col">
			{{
				$data->appends(['keyword'=>request()->keyword])
				->links('vendor.pagination.bootstrap-4')
			}}
		</div>
	</div>
</div>
@endsection