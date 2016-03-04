@extends('layouts.backend')

@section('title', 'Categories')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>List Of Categories</h2>
		</div>
		<div class="col-md-2">
			<a href="{{ route('backend.categories.create') }}" class="btn btn-primary pull-right">Add Category</a>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-bordered">
		 		<thead>
		 			<tr>
		 				<th>Name</th>
		 				<th>Slug</th>
		 				<th colspan="2" style="text-align: center">Actions</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 			@if ($categories->isEmpty())
						<tr>
							<td colspan="4" align="middle"><h3>There are no categories to show</h3></td>
						</tr>
		 			@else

						@foreach($categories as $cat)
							<tr>
								<td>{{$cat->name}}</td>
								<td>{{$cat->slug}}</td>
								<td width="15%">
									<a class="btn btn-success" href="{{ route('backend.categories.edit', $cat->id) }}">
										<span class="glyphicon glyphicon-edit"></span>
										Edit
									</a>
								</td>
								<td width="15%">
									{!! Form::open(['method' => 'DELETE', 'route' => ['backend.categories.destroy', $cat->id]]) !!}
										<button type="submit" class="delete-category btn btn-danger">
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
			{!! $categories->render() !!}
 		</div>
 	</div>
@stop

@section('scripts')

<script>
	$(function() {
		$('body').on('click', '.delete-category', function() {
			if (!confirm('Are you sure?')) {
				return false;
			}
		});
	});
</script>

@stop
