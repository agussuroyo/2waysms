@extends('layouts.admin')

@section('page.title', 'Contacts')
@section('page.description', '')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				Add New
			</div>
			<div class="card-body">
				@include('alert')
				<form action="{{ route('contact.store') }}" method="post" accept-charset="utf-8">
					@csrf
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" value="{{ old('name') }}" class="form-control" />
					</div>
					<div class="form-group">
						<label>Number</label>
						<input type="text" name="number" value="{{ old('number') }}" class="form-control" />
					</div>
					<div class="mt-2">
						<button name="submit" class="btn btn-primary" value="1">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection