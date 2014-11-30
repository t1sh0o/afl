@extends('layouts.default')

@section('content')
	<div class="jumbotron">
		<h2>Добре дошли на сайта на АФЛ</h2>
		<p>
			Тук се записваме за футбол
		</p>
		@if ( ! $currentUser)
			<p>
				{{ link_to_route('registration_path', 'Register', null, ['class' => 'btn btn-lg btn-primary']) }}
			</p>
		@endif
		@if ($currentUser)
			<p>
				{{ link_to_route('matches_path', 'Subscribe', null, ['class' => 'btn btn-lg btn-primary']) }}
			</p>
		@endif

	</div>
@stop