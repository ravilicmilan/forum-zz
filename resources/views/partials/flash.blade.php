@if (Session::has('message'))
	<div class="alert alert-success">
		<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('message') }}
	</div>
@endif