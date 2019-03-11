@extends('layouts.login')

@section('content')

<div class="card-header">
	<h3 class="mb-1">{{ __('Reset Password') }}</h3>
	<p>Please enter your user information.</p>
</div>

<div class="card-body">
	<form method="POST" action="{{ route('password.update') }}">
		@csrf

		<input type="hidden" name="token" value="{{ $token }}">

		<div class="form-group">
			<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>

			@if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group row">
			<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>

			@if ($errors->has('password'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group row">
			<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
		</div>

		<div class="form-group row mb-0">
			<div class="col-md-6 offset-md-4">
				<button type="submit" class="btn btn-primary">
					{{ __('Reset Password') }}
				</button>
			</div>
		</div>
	</form>
</div>

@endsection
