@extends('layouts.backend')

@section('title', $topic->exists ? 'Editing ' . $topic->title : 'Create New Topic')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>{{ $topic->exists ? 'Editing ' . $topic->title : 'Create New Topic' }}</h1>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="back-btn btn btn-default pull-right">&laquo; Back</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			@include('errors.list')

			{!! Form::model($topic, [
				'method' => $topic->exists ? 'PUT' : 'POST', 
				'route' => $topic->exists ? ['backend.topics.update', $topic->id] : ['backend.topics.store'], 
				'class' => 'form-horizontal'
			]) !!}
				
				<div class="form-group">
					{!! Form::label('category_id', 'Category', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-md-8">
						{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-md-8">
						{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Topic Title']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('slug', 'Slug', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-md-8">
						{!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Topic Slug']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-md-10">
						{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Topic Description', 'rows' => 5]) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('content', 'Content', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-md-10">
						{!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Topic Content']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8 col-md-offset-2">
						{!! Form::submit($topic->exists ? 'Update Topic' : 'Add Topic', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>

			{!! Form::close() !!}
		</div>
	</div>
@stop

@section('scripts')

<script src="{{ asset('/ckeditor/ckeditor_basic.js') }}"></script>

<script>
	$(function() {
		CKEDITOR.replace('content');

		$('#title').on('blur', function(e) {
			$('#slug').val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
		});
	});
</script>

@stop