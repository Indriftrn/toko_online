@extends('admin.layout')
@section('title','Dashboard')
@section('content')
<div class="row mt-5 mb-3">
	
	<div class="col-xl-3 col-md-6">
		<div class="card bg-danger text-white mb-4">
			<div class="card-body">
				<h5 class="font-weight-normal">
				<i class="fas fa-cubes"></i> Produk
				<span class="badge badge-light">
					<?php 
						echo App\Produk::count();
					?>
				</span>
				</h5>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" 
				href="{{route('produk.index')}}">
				View Details</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div><!-- /col -->

	<div class="col-xl-3 col-md-6">
		<div class="card bg-dark text-white mb-4">
			<div class="card-body">
				<h5 class="font-weight-normal">
				<i class="fas fa-shopping-basket"></i> New Order
				<span class="badge badge-light">
					<?php
						echo App\Pesanan::where('status_pesanan','belum_bayar')->count();
					?>
				</span>
				</h5>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" 
				href="{{route('pesanan.index')}}?status=belum_bayar">
				View Details</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div><!-- /col -->

	<div class="col-xl-3 col-md-6">
		<div class="card bg-primary text-white mb-4">
			<div class="card-body">
				<h5 class="font-weight-normal">
				<i class="fas fa-gift"></i> Perlu Dikirim
				<span class="badge badge-light">
					<?php
						echo App\Pesanan::where('status_pesanan','lunas')->count();
					?>
				</span>
				</h5>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" 
				href="{{route('pesanan.index')}}?status=lunas">
				View Details</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div><!-- /col -->	

	<div class="col-xl-3 col-md-6">
		<div class="card bg-success text-white mb-4">
			<div class="card-body">
				<h5 class="font-weight-normal">
				<i class="fas fa-shipping-fast"></i> Dikirim
				<span class="badge badge-light">
					<?php
						echo App\Pesanan::where('status_pesanan','Dikirim')->count();
					?>
				</span>
				</h5>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" 
				href="{{route('pesanan.index')}}?status=dikirim">
				View Details</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div><!-- /col -->

</div><!-- /row -->

<div class="clearfix"></div>
<canvas id="myChart" class="mb-5"></canvas>
@endsection


@push('js')
<script src="{{url('js/chart.js')}}"></script>
<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'line',
	// The data for our dataset
	data: {
		labels: @json(array_reverse($laba_kotor['bulan'])),
		datasets: [{
			label: 'Gross Profit',
			backgroundColor: 'rgb(255, 99, 132)',
			borderColor: 'rgb(255, 99, 132)',
			data: @json(array_reverse($laba_kotor['total'])),
			fill: false,
		}]
	},

	options: {
		tooltips: {
			mode: 'index',
			label: 'myLabel',
			callbacks: {
				label: function(tooltipItem, data) {
					return data.datasets[tooltipItem.datasetIndex].label
							+ ': '
							+tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				}
			}
		},
		scales: {
		xAxes: [{
			ticks: {}
		}],
		yAxes: [{
				ticks: {
					// Return on empty string to draw the tick line but hide the tick label
					// Return 'null' or 'undefined' to hide the tick line entirely
					userCallback: function(value, index, values) {
						// Convert the number to a string and splite the string every 3 charaters from the end
						value = value.toString();
						value = value.split(/(?=(?:...)*$)/);

						// Convert the array to a string and format the output
						value = value.join('.');
						return value;
						}
				}
			}]
		},
	}
});
</script>
@endpush