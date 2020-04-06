<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title','Home') | {{ config('app.name') }}</title>
	<link rel="icon" type="image/png" href="favicon.png">
	<!-- Boostrap css -->
	<link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/footer.css')}}">
	@stack('css')
</head>
<body>
<!-- Navbar -->
@include('guest.navbar')
<!-- End Navbar -->

<!-- Content Utama -->
@yield('content')
<!-- End Content Utama -->

<!-- Footer -->
@include('guest.footer')
<a href="{{route('footer')}}">
<!-- End Footer -->

@stack('modal')
<!-- Pertama jQuery, Lalu Papper, Lalu bootraps js -->
<script type="text/javascript" src="{{url('js/jquery.slim.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
@stack('js')
</body>
</html>
