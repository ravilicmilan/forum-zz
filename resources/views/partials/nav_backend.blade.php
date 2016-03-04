<nav class="navbar navbar-static-top navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a href="/" class="navbar-brand">Forum-ZZ</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
			<li><a href="{{ route('backend.users.index') }}">Users</a></li>
			<li><a href="{{ route('backend.categories.index') }}">Categories</a></li>
			<li><a href="{{ route('backend.topics.index') }}">Topics</a></li>
			<li><a href="{{ route('backend.comments.index') }}">Comments</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="/users/me/edit">Edit Profile</a></li>
					<li><a href="/auth/logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>