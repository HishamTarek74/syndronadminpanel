<!doctype html>
<html  dir="{{ Locales::getDir() }}" lang="{{ app()->getLocale() }}">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('syndron/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('syndron/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{ asset('syndron/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{ asset('syndron/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('syndron/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('syndron/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{ asset('syndron/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('syndron/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('syndron/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="{{ app()->getLocale() == 'ar' ? asset('syndron/assets/css/app.css') : asset('syndron/assets/css/app-ltr.css')}}" rel="stylesheet">
	<link href="{{ asset('syndron/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Select 2 -->
    <link href="{{ asset('syndron/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('syndron/assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{  asset('syndron/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{ asset('syndron/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{ asset('syndron/assets/css/header-colors.css')}}" />
	<title>{{ $title ? $title .' | '. app_name() : app_name() }}</title>

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="PUSHER_APP_KEY" content="{{ config('broadcasting.connections.pusher.key') }}">
    <meta name="PUSHER_APP_CLUSTER" content="{{ config('broadcasting.connections.pusher.options.cluster') }}">
    <meta name="PUSHER_APP_HOST" content="{{ config('broadcasting.connections.pusher.options.host') }}">
    <meta name="PUSHER_APP_PORT" content="{{ config('broadcasting.connections.pusher.options.port') }}">

    <link rel="icon" href="{{  optional(Settings::instance('logo')) ? optional(Settings::instance('logo'))->getFirstMediaUrl('logo') : app_favicon() }}" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">
    @stack('styles')

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

		.select2-result-repository__title, .select2-selection-result-repository__title{
			padding-right:10px;
		}

		.select2-selection--single{
			padding-right:20px;
		}
    </style>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper"  id="app">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('syndron/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">{{ app_name() }}</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				@include('layouts.sidebar')
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>

							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">{{count_formatted(\App\Models\Feedback::unread()->count()) ?: null}}</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										@foreach(\App\Models\Feedback::unread() as $notification)
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										@endforeach
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>

									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">{{count_formatted(\App\Models\Feedback::unread()->count()) ?: null}}</span>
									<i class='bx bx-flag'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									@foreach(Locales::get() as $locale)
										<a href="{{ route('locale', $locale->code) }}"
										class="dropdown-item {{ app()->getLocale() == $locale->code ? 'active' : '' }}">
											<img src="{{ $locale->flag }}" alt="{{ $locale->name }}" class="mr-2">
											{{ $locale->name }}
										</a>
									@endforeach
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-1.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-2.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-3.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-4.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-5.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-6.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-7.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-8.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-9.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-10.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('syndron/assets/images/avatars/avatar-11.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ auth()->user()->getAvatar() }}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{auth()->user()->name}}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{ auth()->user()->dashboardProfile() }}"><i class="bx bx-user"></i><span>@lang('users.profile')</span></a>
							</li>
							<li><a class="dropdown-item" href="{{url('/dashboard/settings')}}"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="{{url('/dashboard')}}"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li>
								<a class="dropdown-item" href="#"
								onclick="event.preventDefault();document.getElementById('logoutForm').submit()">
									<i class="fas fa-sign-out-alt mr-2"></i>
									@lang('dashboard.auth.logout')
								</a>
								<form style="display: none;" action="{{ route('logout') }}" method="post" id="logoutForm">
									@csrf
								</form>

							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->


		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">{{ $title }}</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							@isset($breadcrumbs)
                                {{ Breadcrumbs::render(...$breadcrumbs) }}
                            @endisset
						</nav>
					</div>
					<div class="ms-auto">
						<!-- <div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div> -->
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h5 class="mb-0">{{$title}}</h5>
						</div>
					</div>
				</div>
				@include('flash::message')
				{{ $slot }}
			</div>
		</div>
		<!--end page wrapper -->


		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">{{ app_copyright() }}</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<script src="{{ asset(mix('/js/adminlte3.js')) }}"></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset('syndron/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{ asset('syndron/assets/js/jquery.min.js')}}"></script>
	<script src="{{ asset('syndron/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{ asset('syndron/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{ asset('syndron/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('syndron/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{ asset('syndron/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('syndron/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('syndron/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('syndron/assets/js/form-select2.js')}}"></script>

	<script src="{{ asset('syndron/assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{ asset('syndron/assets/js/app.js')}}"></script>
	@stack('scripts')
	<script>
		$('.nav-tabs .nav-link').click(function() {
			$(".nav-tabs").tabs();
		});
	</script>
</body>

</html>
