<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark p-0 shadow">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('dashboard')}}">
	<img src="{{url('images/logo-48-merah.png')}}" width="30" height="30" class="d-inline-block align-top" alt="Logo">
	{{ config('app.name') }}</a>
	<ul class="navbar-nav px-3 ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
				{{ Auth::user()->name }}
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="{{ route('user.profil') }}">
					<i class="fas fa-user"></i> Profile
				</a>
				<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
					<i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
	</ul>
</nav>