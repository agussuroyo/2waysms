<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>{{ config('app.name', '2WaySMS') }}</title>
		<link rel="stylesheet" href="{{ asset('concept/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/circular-std/style.css') }}">
		<link rel="stylesheet" href="{{ asset('concept/assets/libs/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('cencept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
		<style>
			html,
			body {
				height: 100%;
			}

			body {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				padding-top: 40px;
				padding-bottom: 40px;
			}
		</style>
    </head>
    <body>
		<div class="splash-container">
			<div class="card ">
				@yield('content')
			</div>
		</div>
		<script src="{{ asset('concept/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
		<script src="{{ asset('concept/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    </body>
</html>
