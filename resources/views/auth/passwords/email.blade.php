@extends('layouts.login')

@section('content')

<div class="card-header">
	<h3 class="mb-1">{{ __('Reset Password') }}</h3>
	<p>Please enter your user information.</p>
</div>

<div class="card-body">
	@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
	@endif

	<form method="POST" action="{{ route('password.email') }}">
		@csrf

		<div class="form-group">
			<input id="email" type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required>

			@if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group row mb-0">
			<div class="col-12">
				<button type="submit" class="btn btn-primary">
					{{ __('Send Password Reset Link') }}
				</button>
			</div>
		</div>
	</form>
</div>

@endsection
