@extends('layouts.app')

@section('title', $category->name )

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>Category: {{ $category->name }}</h2>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="btn btn-default back-btn pull-right">&laquo; Back</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<a href="/topics/create" class="btn btn-primary">Create New Topic</a>
		</div>
		<div class="col-md-6 pull-right">
			{!! $topics->render() !!}
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Topics</th>
						<th>Author</th>
						<th>Replies</th>
					</tr>
				</thead>
				<tbody>
					@if (count($topics) > 0)
						@foreach($topics as $topic)
							<tr>
								<td>
									<h4>
										<a href="/topics/{{ $topic->slug }}">
											{{ $topic->title }}
										</a>
									</h4>
									<p>{{ $topic->description }}</p>
								</td>
								<td width="15%">
									<a href="users/{{ $topic->user->id }}">
										<div class="thumbnail">
											<img class="user-pic" src="{{$topic->user->avatar or '/img/no-image.jpg'}}" alt="">
										</div>
										{{ $topic->user->name }}
									</a>
									 - <small>{{ $topic->dateCreated() }}</small>
								</td>
								<td width="10%">{{ $topic->comments->count() }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="3">There are no topics for this category yet.</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			
		</div>
		<div class="col-md-6 pull-right">
			{!! $topics->render() !!}
		</div>
	</div>

@stop