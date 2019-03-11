@extends('layouts.login')

@section('content')

<div class="card-header">
	<h3 class="mb-1">Registrations Form</h3>
	<p>Please enter your user information.</p>
</div>
<div class="card-body">
	<form method="POST" action="{{ route('register') }}">
		@csrf
		<div class="form-group">
			<input class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" required="" placeholder="Username" autocomplete="off">
			@if ($errors->has('name'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group">
			<input class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
			@if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group">
			<input class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" id="pass1" type="password" name="password" required="" placeholder="Password">
			@if ($errors->has('password'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group">
			<input class="form-control form-control-lg{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" type="password" name="password_confirmation" required="" placeholder="Confirm">
			@if ($errors->has('password_confirmation'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('password_confirmation') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group pt-2">
			<button class="btn btn-block btn-primary" type="submit">{{ __('Register') }}</button>
		</div>
		<div class="form-group">
			<label class="custom-control custom-checkbox">
				<input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
			</label>
		</div>
	</form>
</div>
<div class="card-footer bg-white">
	<p>Already member? <a href="{{ url('login') }}" class="text-secondary">Login Here.</a></p>
</div>

@endsection
