@extends('guest.app')
@section('title','About')
@section('content')

<div class="container mt-3">
	<form action="?page=home" method="post">   
		<div class="jumbotron">
            <h1 class="display-4">Terima Kasih!</h1>
            <p class="lead">Kami akan segera menghubungi anda, untuk memperoses pesanan anda</p>
            <button class="btn btn-outline-secondary" type="submit">Kembali Ke Home</button>
        </div>
    </form>
</div>

@endsection
