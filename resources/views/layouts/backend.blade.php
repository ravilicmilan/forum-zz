<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	<link rel="stylesheet"  href="/css/bootstrap-backend.css">
	<link rel="stylesheet"  href="/css/backend.css">
</head>
<body>
	@include('partials.nav_backend');

	<div class="container">
		@include('partials.flash')

		@yield('content')
	</div>

	@include('partials.footer')

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>

	@yield('scripts')
</body>
</html>