@extends('layouts.admin')

@section('page.title', 'Contacts')
@section('page.description', 'List of contact')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<h5 class="card-header">
				List of Contact
			</h5>
			<div class="card-body">
				@include('alert')
				<div class="row">
					<div class="col-12 mb-3">
						<a href="{{ route('contact.create') }}" class="btn btn-primary">Add New</a>
					</div>
				</div>
				<table class="table table-bordered table-striped table-light">
					<thead>
						<tr>
							<th>Name</th>
							<th>Number</th>
							<th>Date Added</th>
							<th>Trigger</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($contacts as $contact)						
						<tr>
							<td>{{ $contact->name }}</td>
							<td>{{ $contact->number }}</td>
							<td>{{ $contact->created_at->format('d M Y h:i A') }}</td>
							<td>
								<div class="btn-group ml-auto">
									<a href="{{ route('sms.to', $contact->id) }}" class="btn btn-sm btn-outline-light">SMS</a>
									<a href="" class="btn btn-sm btn-outline-light">Call</a>
								</div>
							</td>
							<td>
								<div class="btn-group ml-auto">
									<a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-sm btn-info">Edit</a>
									<form action="{{ route('contact.destroy', $contact->id) }}" method="post">
										@csrf
										@method('delete')
										<button type="submit" value="1" class="btn btn-sm btn-danger">Delete</button>
									</form>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<br/>
				<div class="row">
					<div class="col-12">
						{{ $contacts->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
