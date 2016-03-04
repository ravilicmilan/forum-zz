@extends('layouts.app')

@section('title', 'Search')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>Search Results For Keyword: {{ $search }}</h2>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="btn btn-default pull-right back-btn">&laquo; Back</a>
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
						<th>Category</th>
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
								<td>
									<a href="users/{{ $topic->user->id }}">{{ $topic->user->name }}</a>
									 - <small>{{ $topic->dateCreated() }}</small>
								</td>
								<td>
									<a class="text-info" href="/{{ $topic->category->slug  }}">
										{{ $topic->category->name }}
									</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="3"><h3>There are no topics matching the search keyword.</h3></td>
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