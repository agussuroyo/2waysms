@extends('layouts.admin')

@section('page.title', 'SMS')
@section('page.description', 'Send SMS')

@section('js')
<script type="text/javascript">
var numbers = '{{ $number }}'
</script>
<script src="{{ asset('js/sms.js') }}"></script>
@endsection

@section('content')
<div class="card">
	<h5 class="card-header">Send SMS</h5>
	<div class="card-body">
		<div id="sms"></div>
	</div>
</div>
@endsection