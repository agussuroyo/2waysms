@extends('layouts.admin')

@section('page.title', 'SMS')
@section('page.description', 'Send SMS')

@section('content')
<div class="card">
	<h5 class="card-header">Send SMS</h5>
	<div class="card-body">
		<form class="needs-validation" action="" method="post">			
			<div class="form-row">
				<div class="col-6">
					<label>Message</label>
					<textarea name="message" class="form-control" rows="10"></textarea>
				</div>
				<div class="col-6 mb-2">
					<label>Numbers</label>
					<textarea name="numbers" class="form-control" rows="10">{{ $number }}</textarea>
					<em>Phone number separated by new line.</em>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
					<button class="btn btn-primary" type="submit">Submit form</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection