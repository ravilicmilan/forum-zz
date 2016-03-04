<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	<link rel="stylesheet"  href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet"  href="{{ asset('css/app.css') }}">
</head>
<body>
	@include('partials.nav');

	<div class="container">
		@include('partials.flash')

		@yield('content')
	</div>

	@include('partials.footer')

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

	@yield('scripts')
</body>
</html>