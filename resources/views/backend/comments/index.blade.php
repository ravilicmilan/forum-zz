@extends('layouts.backend')

@section('title', 'Comments')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>List Of Comments</h2>
		</div>
		<div class="col-md-2">
			<a href="{{ route('backend.comments.create') }}" class="btn btn-primary pull-right">Add Comment</a>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-bordered">
		 		<thead>
		 			<tr>
		 				<th>Username</th>
		 				<th>Comment Text</th>
		 				<th>Published</th>
		 				<th colspan="2" style="text-align: center">Actions</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 			@if ($comments->isEmpty())
						<tr>
							<td colspan="5" align="middle"><h3>There are no comments to show</h3></td>
						</tr>
		 			@else

						@foreach($comments as $comment)
							<tr>
								<td>{{ $comment->user->name }}</td>
								<td>{{ $comment->comment }}</td>
								<td>{{ $comment->dateCreated() }}</td>
								<td width="10%">
									<a class="btn btn-success" href="{{ route('backend.comments.edit', $comment->id) }}">
										<span class="glyphicon glyphicon-edit"></span>
										Edit
									</a>
								</td>
								<td width="10%">
									{!! Form::open(['method' => 'DELETE', 'route' => ['backend.comments.destroy', $comment->id]]) !!}
										<button type="submit" class="delete-comment btn btn-danger">
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
			{!! $comments->render() !!}
 		</div>
 	</div>
@stop

@section('scripts')

<script>
	$(function() {
		$('body').on('click', '.delete-comment', function() {
			if (!confirm('Are you sure?')) {
				return false;
			}
		});
	});
</script>

@stop
