@extends('layouts.admin')

@section('page.title', 'Profile')
@section('page.description', 'Your profile information')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<h5 class="card-header">
				Identity
			</h5>
			<div class="card-body">
				@include('alert')
				<form action="{{ route('account.update', auth()->user()->id) }}" method="post">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="inputText3" class="col-form-label">Full Name</label>
						<input id="inputText3" type="text" name="name" value="{{ $name }}" class="form-control">
					</div>
					<div class="form-group">
						<label for="inputEmail">Email address</label>
						<input id="inputEmail" type="email" name="email" value="{{ $email }}" placeholder="name@example.com" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" name="submit" value="1" class="btn btn-primary">{{ __('Save') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<h5 class="card-header">
				Password
			</h5>
			<div class="card-body">
				<form action="{{ route('change.password', auth()->user()->id ) }}" method="post">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="password" class="col-form-label">Password</label>
						<input id="password" type="password" name="password" value="" class="form-control">
					</div>
					<div class="form-group">
						<label for="password_confirmation">Password Confirmation</label>
						<input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" name="submit" value="1" class="btn btn-primary">{{ __('Save') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
