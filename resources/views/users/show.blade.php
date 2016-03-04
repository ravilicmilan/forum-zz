@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>User Profile</h2>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="btn btn-default pull-right back-btn">&laquo; Back</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<div class="thumbnail">
				<img class="user-pic" src="{{ $user->avatar or '/img/no-image.jpg' }}" alt="">
			</div>
		</div>

		<div class="col-md-10">
			<h3>User Name: {{ $user->name }}</h3>	
		</div>
	</div>

	<hr>

	@if(count($topics) > 0)
		<h3>Last 5 topics from this user:</h3>
		<br>
		<ul class="list-group">
			@foreach($topics as $topic)
				<li class="list-group-item">
					<a href="/topics/{{ $topic->slug }}">{{ $topic->title }}</a> - 
					<small>{{ $topic->category->name }}</small>
				</li>	
			@endforeach
		</ul>
	@endif

@endsection
