@extends('layouts.backend')

@section('title', $user->exists ? 'Editing ' . $user->name : 'Create New User')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>{{ $user->exists ? 'Editing ' . $user->name : 'Create New User' }}</h1>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="back-btn btn btn-default pull-right">&laquo; Back</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<img src="{{$user->avatar or '/img/no-image.jpg'}}" alt="" class="user-pic">
		</div>

		<div class="col-md-9">
			@include('errors.list')

			{!! Form::model($user, [
				'method' => $user->exists ? 'PUT' : 'POST', 
				'route' => $user->exists ? ['backend.users.update', $user->id] : ['backend.users.store'], 
				'class' => 'form-horizontal'
			]) !!}

				<div class="form-group">
					{!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) !!}
					<div class="col-md-8">
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'User Name']) !!}
					</div>

				</div>

				<div class="form-group">
					{!! Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) !!}
					<div class="col-md-8">
						{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) !!}
					<div class="col-md-8">
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('password_confirmation', 'Password Confirmation', ['class' => 'col-md-3 control-label']) !!}
					<div class="col-md-8">
						{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password Confirmation']) !!}
					</div>
				</div>
				

				<div class="form-group ">
					<label class="col-md-8 col-md-offset-3">
						{!! Form::checkbox('admin') !!} 
						Admin
					</label>
				</div>


				<div class="form-group">
					<div class="col-md-8 col-md-offset-3">
						{!! Form::submit($user->exists ? 'Update User' : 'Add User', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>

			{!! Form::close() !!}
		</div>
	</div>

@stop
