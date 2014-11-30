@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-6">

		@include('layouts.partials.errors')

		<h1>Registration</h1>

		{{ Form::open(['route' => 'registration_path']) }}
		
			<div class="form-group">
				{{ Form::label('username', 'Username:') }}
				{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'username']) }}
			</div>
		
			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) }}
			</div>		
			
			{{ Form::submit('Sign Up', ['class' => 'btn btn-primary']) }}

		{{ Form::close() }}
	</div>
</div>	
@stop