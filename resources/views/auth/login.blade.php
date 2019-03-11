@extends('layouts.login')

@section('content')
<div class="card-header text-center"><a href="{{ url('/') }}"><img class="logo-img" src="{{ asset('concept/assets/images/logo.png') }}" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
<div class="card-body">
	<form method="POST" action="{{ route('login') }}">
		@csrf
		<div class="form-group">
			<input class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" id="username" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Username') }}" autocomplete="off">
			@if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group">
			<input class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" name="password" value="{{ old('password') }}" placeholder="{{ __('Password') }}">
			@if ($errors->has('password'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group">
			<label class="custom-control custom-checkbox">
				<input class="custom-control-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span class="custom-control-label">Remember Me</span>
			</label>
		</div>
		<button type="submit" class="btn btn-primary btn-lg btn-block">
			{{ __('Sign In') }}
		</button>
	</form>
</div>
<div class="card-footer bg-white p-0  ">
	<div class="card-footer-item card-footer-item-bordered">
		@if (Route::has('register'))
		<a class="footer-link" href="{{ route('register') }}">
			{{ __('Register') }}
		</a>
		@endif
	</div>
	<div class="card-footer-item card-footer-item-bordered">
		@if (Route::has('password.request'))
		<a class="footer-link" href="{{ route('password.request') }}">
			{{ __('Forgot Your Password?') }}
		</a>
		@endif
	</div>
</div>
@endsection
