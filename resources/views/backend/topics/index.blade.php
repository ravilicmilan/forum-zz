@extends('layouts.backend')

@section('title', 'Topics')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>List Of Topics</h2>
		</div>
		<div class="col-md-2">
			<a href="{{ route('backend.topics.create') }}" class="btn btn-primary pull-right">Add Topic</a>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-bordered">
		 		<thead>
		 			<tr>
		 				<th>Title</th>
		 				<th>Category</th>
		 				<th>Author</th>
		 				<th>Published</th>
		 				<th colspan="2" style="text-align: center">Actions</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 			@if ($topics->isEmpty())
						<tr>
							<td colspan="6" align="middle"><h3>There are no topics to show</h3></td>
						</tr>
		 			@else

						@foreach($topics as $topic)
							<tr>
								<td>{{ $topic->title }}</td>
								<td>{{ $topic->category->name }}</td>
								<td>
									<a href="{{ route('backend.users.edit', $topic->user->id) }}">{{ $topic->user->name }}</a>
								</td>
								<td>{{ $topic->dateCreated() }}</td>
								<td width="10%">
									<a class="btn btn-success" href="{{ route('backend.topics.edit', $topic->id) }}">
										<span class="glyphicon glyphicon-edit"></span>
										Edit
									</a>
								</td>
								<td width="10%">
									{!! Form::open(['method' => 'DELETE', 'route' => ['backend.topics.destroy', $topic->id]]) !!}
										<button type="submit" class="delete-topic btn btn-danger">
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
			{!! $topics->render() !!}
 		</div>
 	</div>
@stop

@section('scripts')

<script>
	$(function() {
		$('body').on('click', '.delete-topic', function() {
			if (!confirm('Are you sure?')) {
				return false;
			}
		});
	});
</script>

@stop
