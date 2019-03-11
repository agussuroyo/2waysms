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
				<table class="table table-bordered table-striped table-light">
					<thead>
						<tr>
							<th>Name</th>
							<th>Number</th>
							<th>Date Added</th>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($contacts as $msg)						
						<tr>
							<td>{{ $msg->name }}</td>
							<td>{{ $msg->number }}</td>
							<td>{{ $msg->created_at->format('d M Y h:i A') }}</td>
							<td>
								<div class="btn-group ml-auto">
									<a href="{{ route('sms.to', $msg->id) }}" class="btn btn-sm btn-outline-light">SMS</a>
									<a href="" class="btn btn-sm btn-outline-light">Call</a>
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
