@extends('layouts.app')

@section('title', $topic->title)

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>
				<a href="/{{ $topic->category->slug }}">{{ $topic->category->name }}</a> 
				/ {{ $topic->title }}
			</h2>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="btn btn-default back-btn pull-right">&laquo; Back</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<div class="thumbnail">
				<a href="/users/{{ $topic->user->id }}">
					<img class="user-pic" src="{{$topic->user->avatar or '/img/no-image.jpg'}}" alt="">
				</a>
			</div>

			<p>
				<a href="/users/{{ $topic->user->id }}">
					{{ $topic->user->name }}
				</a>
			</p>
			<p class="small">published {{ $topic->dateCreated() }}</p>

			@if (Auth::check())
				@if(Auth::user()->id == $topic->user_id)
					<p><a href="/topics/edit/{{ $topic->id }}" class="btn btn-success">Edit Topic</a></p>
				@endif
			@endif

		</div>

		<div class="col-md-10">
			<h4>{{ $topic->description }}</h4>
			<br>
			{!! $topic->content !!}
		</div>
	</div>
	<hr>

	@if(count($comments) > 0)
		<h3>List of comments</h3>
		<br>
		@foreach ($comments as $comment)
			<div class="row">
				<div class="col-md-2">
					<div class="thumbnail">
						<a href="/users/{{ $comment->user->id }}">
							<img class="user-pic" src="{{$comment->user->avatar or '/img/no-image.jpg'}}" alt="">
						</a>
					</div>
					<p>
						<a href="/users/{{ $comment->user->id }}">
							{{ $comment->user->name }} 
						</a>
						<small>{{ $comment->dateCreated() }}</small>
					</p>
				</div>
				<div class="col-md-10">
					<p>{{ $comment->comment }}</p>
				</div>
			</div>
			<hr>
		@endforeach
		<hr>
	@endif
	<div class="row">
		<form class="form-horizontal" role="form" method="POST" action="/comments/create">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="topic_id" value="{{ $topic->id }}">
			<div class="form-group">
				<label class="col-md-2 control-label">Add comment</label>
				<div class="col-md-10">
					<textarea rows="10" name="comment" class="form-control" id="comment" placeholder="Your comment goes here..."></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10 col-md-offset-2">
					<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
						Post Comment
					</button>
				</div>
			</div>
		</form>
	</div>
@stop