@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>Edit Profile</h2>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="btn btn-default pull-right back-btn">&laquo; Back</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<div class="thumbnail">
				@if ($user->avatar != null)
					<img src="{{ $user->avatar }}" alt="{{ $user->name }}">
				@else
					<img src="/img/no-image.jpg" alt="No Image">
				@endif
			</div>
		</div>

		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Profile
				</div>

				<div class="panel-body">
					@include('errors.list')

					<form class="form-horizontal" role="form" method="POST" action="/users/me/edit" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ $user->name }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ $user->email }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Avatar Image: (1MB max)</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="avatar">

							</div>
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update Profile
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
