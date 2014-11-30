@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-6">

		@include('layouts.partials.errors')

		<h1>Log In</h1>

		{{ Form::open(['route' => 'login_path']) }}
		
			<div class="form-group">
				{{ Form::label('username', 'Username:') }}
				{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'username']) }}
			</div>
		
			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) }}
			</div>		
			
			{{ Form::submit('Log In', ['class' => 'btn btn-primary']) }}

		{{ Form::close() }}
	</div>
</div>	
@stop