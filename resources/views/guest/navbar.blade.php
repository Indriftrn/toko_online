<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
	<a href="{{ route('home') }}" class="navbar-brand">
		<img src="{{ url('images/logo-48-merah.png') }}" width="30" height="30" class="d-inline-block align-top" alt="Company Logo">
		company
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
		<span class="navbar-toggler-icon"></span>
	</button>

<div class="collapse navbar-collapse" id="navbarContent"> 
	<!-- Form Pencarian -->
	<form class="my-2 my-lg-0 mr-auto" action="{{route('search')}}">
		<div class="input-group">
			<input name="keyword" type="text" value="{{request()->keyword}}" class="form-control" placeholder="Cari...">
			<div class="input-group-append">
				<button class="btn btn-primary" type="submit">
					Go
				</button>
			</div>
		</div>
	</form>
	<!-- Navigasi navbar -->
	<ul class="navbar-nav">
		<li class="nav-item{{ request()->is('about*') ? 'active':''}}">
			<a href="{{route('about')}}" class="nav-link">About</a>
		</li>
		<li class="nav-item dropdown {{request()->is('kategori*') ? 'active':''}}">
			<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
				Kategori 
			</a>
			<div class="dropdown-menu dropdown-menu-right">
			@foreach(App\Kategori::orderBy('nama_kategori','asc')->get() as $kat)
				<a class="dropdown-item" href="{{ route('kategori',['kategori'=>$kat->id]) }}">
					<i class="fas fa-user"></i> {{ $kat->nama_kategori }}
				</a>
			@endforeach
			</div>
		</li>
	</ul> 
</div>
</nav>


