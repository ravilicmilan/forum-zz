@extends('layouts.app')

@section('title', 'Create New Topic')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h2>Create New Topic</h2>
		</div>
		<div class="col-md-2">
			<a href="javascript:history.back()" class="btn btn-default pull-right back-btn">&laquo; Back</a>
		</div>
	</div>
	<hr>
	<div class="row">
		@include('errors.list')

		<form class="form-horizontal" role="form" method="POST" action="/topics/create">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<div class="form-group">
				<label class="col-md-2 control-label">Category</label>
				<div class="col-md-10">
					<select name="category_id" id="category_id" class="form-control">
						<option value="0">Choose Category</option>
						@foreach($categories as $cat)
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Title</label>
				<div class="col-md-10">
					<input value="{{ old('title') }}" name="title" id="title" class="form-control" placeholder="Title">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Slug</label>
				<div class="col-md-10">
					<input value="{{ old('slug') }}" name="slug" id="slug" class="form-control" placeholder="Slug">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Description</label>
				<div class="col-md-10">
					<textarea rows="5" name="description" value="{{ old('description') }}" class="form-control" id="description" >{{ old('description') }}</textarea>
				</div>
			</div>
	
			<div class="form-group">
				<label class="col-md-2 control-label">Content</label>
				<div class="col-md-10">
					<textarea rows="30" name="content" class="form-control" id="content" placeholder="Here You can enter your links, images and other content">
						{{ old('content') }}
					</textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10 col-md-offset-2">
					<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
						Create Topic
					</button>
				</div>
			</div>
		</form>
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
