@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Welcome To Our Forum-ZZ</h1>
			<p>Check out all the different topics and categories</p>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<table id="categories-table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Category</th>
						<th>Total Topics</th>
						<th>Last Topic</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $cat)
						<tr>
							<td class="categories-slug-td">
								<h4><a href="/{{ $cat->slug }}">{{ $cat->name }}</a></h4>
							</td>
							<td class="categories-count-td">{{ $cat->topics->count() }}</td>
							<td class="categories-last-td">
								@if($cat->topics->count() > 0)
									<a class="text-info" href="/topics/{{ $cat->topics()->orderBy('created_at', 'desc')->first()->slug }}">
										{{ $cat->topics()->orderBy('created_at', 'desc')->first()->title }}
									</a>
									- <small>{{ $cat->topics()->orderBy('created_at', 'desc')->first()->dateCreated() }}</small>
								@else
									<small>There are no topics for this category</small>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop