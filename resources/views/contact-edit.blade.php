@extends('layouts.admin')

@section('page.title', 'Contacts')
@section('page.description', '')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				Edit
			</div>
			<div class="card-body">
				@include('alert')
				<form action="{{ route('contact.update', $id) }}" method="post" accept-charset="utf-8">
					@csrf
					@method('put')
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" value="{{ $name }}" class="form-control" />
					</div>
					<div class="form-group">
						<label>Number</label>
						<input type="text" name="number" value="{{ $number }}" class="form-control" />
					</div>
					<div class="mt-2">
						<button name="submit" class="btn btn-primary" value="1">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection