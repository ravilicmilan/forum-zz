<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	<link rel="stylesheet"  href="/css/bootstrap.css">
	<link rel="stylesheet"  href="/css/app.css">
</head>
<body>
	@include('partials.nav');

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