@extends('layouts.backend')

@section('title', 'Users')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>List Of Users</h2>
		</div>
		<div class="col-md-2">
			<a href="{{ route('backend.users.create') }}" class="btn btn-primary pull-right">Add User</a>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-bordered">
		 		<thead>
		 			<tr>
		 				<th>Name</th>
		 				<th>Email</th>
		 				<th>Avatar</th>
		 				<th>Admin</th>
		 				<th colspan="2" style="text-align: center">Actions</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 			@if ($users->isEmpty())
						<tr>
							<td colspan="5" align="middle"><h3>There are no users to show</h3></td>
						</tr>
		 			@else

						@foreach($users as $user)
							<tr class="{{ $user->isAdmin() ? 'bg-info' : '' }}">
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
									<img class="user-pic" src="{{$user->avatar or '/img/no-image.jpg'}}" alt="">
								</td>
								<td>{{ $user->isAdmin() ? 'Yes' : 'No' }}</td>
								<td width="15%">
									<a class="btn btn-success" href="{{ route('backend.users.edit', $user->id) }}">
										<span class="glyphicon glyphicon-edit"></span>
										Edit
									</a>
								</td>
								<td width="15%">
									{!! Form::open(['method' => 'DELETE', 'route' => ['backend.users.destroy', $user->id]]) !!}
										<button type="submit" class="delete-user btn btn-danger">
											<span class="glyphicon glyphicon-remove"></span>
											Delete
										</button>
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
					@endif
		 		</tbody>
		 	</table>
		</div>
	</div>
	<br>
 	<div class="row">
 		<div class="col-md-12">
			{!! $users->render() !!}
 		</div>
 	</div>
@stop

@section('scripts')

<script>
	$(function() {
		$('body').on('click', '.delete-user', function() {
			if (!confirm('Are you sure?')) {
				return false;
			}
		});
	});
</script>

@stop
