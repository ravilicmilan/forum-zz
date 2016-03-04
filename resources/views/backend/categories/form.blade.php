@extends('layouts.backend')

@section('title', $category->exists ? 'Editing ' . $category->name : 'Create New Category')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>{{ $category->exists ? 'Editing ' . $category->name : 'Create New Category' }}</h1>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="back-btn btn btn-default pull-right">&laquo; Back</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			@include('errors.list')

			{!! Form::model($category, [
				'method' => $category->exists ? 'PUT' : 'POST', 
				'route' => $category->exists ? ['backend.categories.update', $category->id] : ['backend.categories.store'], 
				'class' => 'form-horizontal'
			]) !!}

				<div class="form-group">
					{!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-md-8">
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category Name']) !!}
					</div>

				</div>

				<div class="form-group">
					{!! Form::label('slug', 'Slug', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-md-8">
						{!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Category Slug']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8 col-md-offset-2">
						{!! Form::submit($category->exists ? 'Update Category' : 'Add Category', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>

			{!! Form::close() !!}
		</div>
	</div>

@stop

@section('scripts')

<script>
	$(function() {
		$('#name').on('blur', function(e) {
			$('#slug').val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
		});
	});
</script>

@stop
