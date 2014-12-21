@extends('layouts.default')

@section('content')
	<div>{{ $match['match_type']['match_type']}}</div>
	
	@if ( ! $currentUser->isSubscribedFor($match['id']))
		<div>{{ link_to_route('subsciption_path', 'Subscribe', 
			['match_id' => $match['id'], 'user_id' => $currentUser['id']], ['class' => 'btn btn-success']) }}
		</div>
	@endif

	<div>{{$match['location']}}</div>
	<div>{{$match['date']}}</div>
	<hr/>

	<div class="col-md-6">
		<h3>Subscriber players:</h3>

		@if (count($players) > 0)
			<ul>
				@foreach ($players as $player)
					<li>{{ $player['username'] }}</li>	
				@endforeach
			</ul>
		@else
			<h4>There are no players subscribed for this match!</h4>
		@endif

	</div>

	<div class="col-md-6">
		<h3>Teams:</h3>
	</div>

@stop