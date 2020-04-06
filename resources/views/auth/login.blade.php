<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="{{url('logo-144-company.png')}}">
		<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}">
		<title>Login | {{ config('app.name') }}</title>
	</head>
	<body>

		<div class="container mt-5">
			<div class="row">
				<div class="col text-center mb-3">
					<img src="{{url('images/logo-144-company.png')}}" width="100" align="middle">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<form method="post" action="{{ route('login') }}">
						@csrf
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									<i class="fas fa-lock"></i>
										Login Company
									</h4>
								</div>

								<div class="card-body">
									<div class="form-group">
										<label><i class="fas fa-envelope"></i> Email</label>
										<input type="text" name="email" placeholder="Email..."
										value="{{ old('email') }}"
										class="form-control @error('email') is-invalid @enderror">
										@error('email')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>

									<div class="form-group">
										<label><i class="fas fa-key"></i> Password</label>
										<input type="password" name="password" placeholder="Password..."
										class="form-control @error('password') is-invalid @enderror">
										@error('password')
											<span class="invalid-feedback">
												{{ $message }}
											</span>
										@enderror
									</div>

									<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="remember"
											id="remember" {{ old('remember') ? 'checked' : '' }}>
											<label class="form-check-label" for="remember">
												{{ __('Remember Me') }}
											</label>
										</div>
									</div>
								</div>

								<div class="card-footer">
									<button type="submit" class="btn btn-primary">
										<i class="fas fa-sign-in-alt"></i> Login
									</button>
								</div>

								</div>
							</form>
						</div>
					</div>

				</div>

				<script src="{{url('js/jquery.slim.min.js')}}"></script>
				<script src="{{url('js/popper.min.js')}}"></script>
				<script src="{{url('js/bootstrap.min.js')}}"></script>
			</body>
		</html>