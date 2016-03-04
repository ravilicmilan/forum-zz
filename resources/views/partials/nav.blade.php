<nav class="navbar navbar-static-top navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
		      	  	<span class="sr-only">Toggle navigation</span>
		      	  	<span class="icon-bar"></span>
		      	  	<span class="icon-bar"></span>
		      	  	<span class="icon-bar"></span>
		      	</button>
			<a href="/" class="navbar-brand">Forum-ZZ</a>
		</div>
		<div id="navigation" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				@if (Auth::guest())
					<li><a href="/auth/login">Login</a></li>
					<li><a href="/auth/register">Register</a></li>
				@else
					<li><a  href="/topics/create">Add New Topic</a></li>
					@if (Auth::user()->admin == 1)
						<li><a href="/backend/dashboard">Dashboard</a></li>
					@endif			
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/users/me/edit">Edit Profile</a></li>
							<li><a href="/auth/logout">Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
					
			<form method="GET" action="/topics/search/" class="navbar-form navbar-right" id="search-form" role="search">
				<div class="input-group">
			      	<input type="text" name="search" class="form-control" placeholder="Search forum for...">
			      	<span class="input-group-btn">
			      	  	<button class="btn btn-default" type="submit">Search</button>
			      	</span>
			    </div>
			</form>	
		</div>
	</div>
</nav>