@if(count($errors))

<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">
		&times;
	</button>
	{{ $errors->first('albaran[$key]') }}
</div>

@endif