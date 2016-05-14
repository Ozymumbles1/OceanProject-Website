<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="OceanProject - xat Bot Hoster">
		<meta name="author" content="Guillaume">

		<title>OceanProject</title>

		<link rel="stylesheet" href="{{ elixir("css/app.css") }}">
		@yield('head')
	</head>

	<body>
		<header id="topnav">
			<div class="topbar-main">
				<div class="container">

					<div class="logo">
						<a href="{{ route('panel') }}" class="logo">
							<i class="md md-laptop"></i>
							<span>OceanProject</span>
						</a>
					</div>

					<div class="menu-extras">
						<ul class="nav navbar-nav navbar-right pull-right">
							<li class="dropdown hidden-xs">
								<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
									<i class="md md-notifications"></i>
									<span class="badge badge-xs badge-pink">3</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-lg">
									<li class="text-center notifi-title">Notification</li>
									<li class="list-group nicescroll notification-list">
										
										<a href="javascript:void(0);" class="list-group-item">
											<div class="media">
												<div class="pull-left p-r-10">
													<em class="fa fa-diamond noti-primary"></em>
												</div>
												<div class="media-body">
													<h5 class="media-heading">A new order has been placed A new order has been placed</h5>
													<p class="m-0">
														<small>There are new settings available</small>
													</p>
												</div>
											</div>
										</a>

										<a href="javascript:void(0);" class="list-group-item">
											<div class="media">
												<div class="pull-left p-r-10">
													<em class="fa fa-diamond noti-primary"></em>
												</div>
												<div class="media-body">
													<h5 class="media-heading">New settings</h5>
													<p class="m-0">
														<small>There are new settings available</small>
													</p>
												</div>
											</div>
										</a>

										<a href="javascript:void(0);" class="list-group-item">
											<div class="media">
												<div class="pull-left p-r-10">
													<em class="fa fa-diamond noti-primary"></em>
												</div>
												<div class="media-body">
													<h5 class="media-heading">Updates</h5>
													<p class="m-0">
														<small>There are <span class="text-primary">2</span> new updates available</small>
													</p>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" class=" text-right">
											<small><b>See all notifications</b></small>
										</a>
									</li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="http://i.imgur.com/rk9B7eA.jpg" alt="user-img" class="img-circle"> </a>
								<ul class="dropdown-menu">
									<li><a href="{{ route('panel.user.profile') }}"><i class="ti-user m-r-5"></i> Profile</a></li>
									<li><a href="{{ route('panel.user.logout') }}"><i class="ti-power-off m-r-5"></i> Logout</a></li>
								</ul>
							</li>

						</ul>

						<div class="menu-item">
							<a class="navbar-toggle">
								<div class="lines">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</a>
						</div>

					</div>
				</div>
			</div>

			<div class="navbar-custom">
				<div class="container">
					<div id="navigation">
						<ul class="navigation-menu">
							<li class="has-submenu">
								<a href="{{ route('panel') }}"><i class="md md-dashboard"></i>Dashboard</a>
							</li>

							@level(5)
							<li class="has-submenu">
								<a href="#"><i class="md md-help"></i>Support</a>
								<ul class="submenu">
									<li><a href="{{ route('panel.support.users') }}">Users</a></li>
									<li><a href="#">Example2</a></li>
									<li><a href="#">Example3</a></li>
									<li><a href="#">Example4</a></li>
									<li><a href="#">Example5</a></li>
								</ul>
							</li>
							@endlevel

						</ul>
					</div>
				</div>
			</div>
		</header>

		<div class="wrapper">
			<div class="container">
				@yield('content')
			</div>
		</div>

		<footer class="footer text-right">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?= date('Y') ?> © OceanProject
					</div>
				</div>
			</div>
		</footer>

		<script src="{{ elixir("js/app.js") }}"></script>
		<script src="/build/plugins/notifyjs/dist/notify.min.js"></script>
		<script src="/build/plugins/notifications/notify-metro.js"></script>
		@if (count($errors) > 0)
			<script type="text/javascript">
			@foreach ($errors->all() as $error)
				$.Notification.autoHideNotify('error', 'top right', 'An error occurred', '{{ $error }}');
			@endforeach
			</script>
		@endif
		@if (Session::get('success'))
			<script type="text/javascript">
				$.Notification.autoHideNotify('success', 'top right', 'Success', '{{ (Session::get("success")) }}');
			</script>
		@endif
		@yield('footer')
	</body>
</html>