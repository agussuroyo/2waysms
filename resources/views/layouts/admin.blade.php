<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>{{ config('app.name', '2WaySMS') }}</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('concept/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/circular-std/style.css') }}">
		<link rel="stylesheet" href="{{ asset('concept/assets/libs/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
		@yield('css')
	</head>
	<body>
		<!-- ============================================================== -->
		<!-- main wrapper -->
		<!-- ============================================================== -->
		<div class="dashboard-main-wrapper">
			<!-- ============================================================== -->
			<!-- navbar -->
			<!-- ============================================================== -->
			<div class="dashboard-header">
				<nav class="navbar navbar-expand-lg bg-white fixed-top">
					<a class="navbar-brand" href="{{ url('home') }}">{{ config('app.name', '2WaySMS') }}</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse " id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto navbar-right-top">							
							<li class="nav-item dropdown nav-user">
								<a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('concept/assets/images/avatar-1.jpg') }}" alt="" class="user-avatar-md rounded-circle"></a>
								<div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
									<div class="nav-user-info">
										<h5 class="mb-0 text-white nav-user-name">
											{{ \Auth::user()->name }}
										</h5>
									</div>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>Logout</a>
								</div>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<!-- ============================================================== -->
			<!-- end navbar -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- left sidebar -->
			<!-- ============================================================== -->
			<div class="nav-left-sidebar sidebar-dark">
				<div class="menu-list">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="d-xl-none d-lg-none" href="{{ url('home') }}">Dashboard</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav flex-column">
								<li class="nav-divider">
									Menu
								</li>
								<li class="nav-item ">
									<a class="nav-link {{ Request::segment(1) == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
										<i class="fa fa-fw fa-envelope"></i>
										All Messages
									</a>
								</li>								
								<li class="nav-item ">
									<a class="nav-link {{ Request::segment(1) == 'bulk' ? 'active' : '' }}" href="{{ route('sms') }}">
										<i class="fa fa-fw fa-envelope"></i>
										Send SMS
									</a>
								</li>								
								<li class="nav-item ">
									<a class="nav-link {{ Request::segment(1) == 'contact' ? 'active' : '' }}" href="{{ url('contact') }}">
										<i class="fa fa-fw fa-bars"></i>
										Contacts
									</a>									
								</li>	
								<li class="nav-item ">
									<a class="nav-link {{ Request::segment(1) == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
										<i class="fa fa-fw fa-user-circle"></i>
										Profile
									</a>									
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end left sidebar -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- wrapper  -->
			<!-- ============================================================== -->
			<div class="dashboard-wrapper">
				<div class="container-fluid dashboard-content">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="page-header">
										<h2 class="pageheader-title">@yield('page.title')</h2>
										<p class="pageheader-text">@yield('page.description')</p>										
									</div>
								</div>
							</div>
							@yield('content')
						</div>
					</div>
				</div>				
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end main wrapper -->
		<!-- ============================================================== -->
		<!-- Optional JavaScript -->
		<script src="{{ asset('concept/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
		<script src="{{ asset('concept/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
		<script src="{{ asset('concept/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
		<script src="{{ asset('concept/assets/libs/js/main-js.js') }}"></script>
		@yield('js')
	</body>

</html>