@extends('layouts.admin')

@section('page.title', 'Welcome')
@section('page.description', 'List of message')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<h5 class="card-header">
				List of Message
			</h5>
			<div class="card-body">
				<table class="table table-bordered table-striped table-light">
					<thead>
						<tr>
							<th>From</th>
							<th>Message</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						@foreach($messages as $msg)						
						<tr>
							<td>{{ Str::words($msg->sender->name, 2) }}</td>
							<td>{{ Str::words($msg->message, 7) }}</td>
							<td>{{ $msg->created_at->format('d M Y h:i A') }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<br/>
				<div class="row">
					<div class="col-12">
						{{ $messages->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
