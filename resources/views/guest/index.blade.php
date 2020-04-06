@extends('guest.app')
@section('title','Home')
@section('content')

<div class="container-fluid">
	<!-- Banner -->
	<div class="row mt-3">
		<!-- Banner kiri -->
		<div class="col-md-8 mb-3">
			<div id="banner" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#banner" data-slide-to="0" class="active"></li>
					<li data-target="#banner" data-slide-to="1"></li>
					<li data-target="#banner" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="images/banner1.jpg" class="d-block w-100">
					</div>
					<div class="carousel-item">
						<img src="images/banner2.jpg" class="d-block w-100">
				    </div>
				    <div class="carousel-item">
				    	<img src="images/banner3.jpg" class="d-block w-100">
				    </div>
				</div>

				<a href="#banner" class="carousel-control-prev" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
				</a>
                <a href="#banner" class="carousel-control-next" role="button" data-slide="next">
                	<span class="carousel-control-next-icon"></span>
                </a>

			</div>
		</div><!-- End Banner Kiri -->

		<!-- Banner Kanan -->
		<div class="col-md-4 mb-3">
			<img src="images/banner4.jpg" class="d-block w-100 img-fluid">
			<img src="images/banner5.jpg" class="d-block w-100 img-fluid mt-3">
		</div><!-- End Banner Kanan -->

    </div><!-- End Banner -->

    <!-- Produk -->
    <div class="row">

        @php 
        $data = App\Produk::orderBy('id','desc')->limit(12)->get();
        @endphp

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

    </div><!-- End Produk -->

</div>
@endsection