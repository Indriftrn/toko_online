<nav class="col-md-2 d-none d-md-block bg-light sidebar">
	<div class="sidebar-sticky">
		<ul class="navbar-nav flex-column">
			
			<li class="nav-item">
				<a class="nav-link {{ request()->is('admin') ? 'active':''}}"
					href="{{route('dashboard')}}">
					<i class="fas fa-home"></i> Dashboard
				</a>
			</li><!-- ./Dashboard -->

			<li class="nav-item">
				<a class="nav-link {{ request()->is('admin/pesanan*') ? 'active':''}}" 
					href="{{ route('pesanan.index') }}">
					<i class="fas fa-shopping-basket"></i> Pesanan
				</a>
			</li><!-- ./Pesanan -->

			<li class="nav-item">
				<a class="nav-link {{ request()->is('admin/produk*') ? 'active':''}}" 
					href="{{ route('produk.index') }}">
					<i class="fas fa-cubes"></i> Produk
				</a>
			</li><!-- ./Produk -->

			<li class="nav-item">
				<a class="nav-link {{ request()->is('admin/kategori*') ? 'active':''}}" 
					href="{{ route('kategori.index') }}">
					<i class="fas fa-list"></i> Kategori
				</a>
			</li><!-- ./Kategori -->

			<li class="nav-item">
				<a class="nav-link {{ request()->is('admin/user*') ? 'active':''}}" 
					href="{{ route('user.index') }}">
					<i class="fas fa-users"></i> Pengguna
				</a>
			</li><!-- ./Pengguna -->
		</ul>
	</div>
</nav>