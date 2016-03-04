@extends('layouts.backend')

@section('title', $comment->exists ? 'Editing Comment' : 'Create New Comment')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>{{ $comment->exists ? 'Editing Comment': 'Create New Comment' }}</h1>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="back-btn btn btn-default pull-right">&laquo; Back</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			@include('errors.list')

			@if($comment->exists)
				<div class="col-md-3"><h4 class="pull-right"><b>Comment Author:</b></h4></div>
				<div class="col-md-8">
					<a href="{{ route('backend.users.edit', $comment->user->id) }}">
						<h4>{{ $comment->user->name }}</h4>
					</a>
				</div>
				
				<div class="col-md-3"><h4 class="pull-right"><b>Comment Topic:</b></h4></div>
				<div class="col-md-8">
					<a href="{{ route('backend.topics.edit', $comment->topic->id) }}">
						<h4>{{ $comment->topic->title }}</h4>
					</a>
				</div>
				<div class="clearfix"></div>
				<hr>
			@endif

			{!! Form::model($comment, [
				'method' => $comment->exists ? 'PUT' : 'POST', 
				'route' => $comment->exists ? ['backend.comments.update', $comment->id] : ['backend.comments.store'], 
				'class' => 'form-horizontal'
			]) !!}

				{!! Form::hidden('topic_id') !!}

				<div class="form-group">
					{!! Form::label('comment', 'Comment Text', ['class' => 'col-md-3 control-label']) !!}
					<div class="col-md-8">
						{!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Comment Text']) !!}
					</div>
				</div>


				<div class="form-group">
					<div class="col-md-8 col-md-offset-3">
						{!! Form::submit($comment->exists ? 'Update Comment' : 'Add Comment', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>

			{!! Form::close() !!}
		</div>
	</div>

@stop

