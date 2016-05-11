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
		
		<div class="wrapper-page">
			@yield('content')
		</div>

		<script src="{{ elixir("js/app.js") }}"></script>
		@yield('footer')
	</body>
</html>