@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="well">

			<h3>All Matches</h3>

			@forelse ($matches as $match)
				@if ( ! $currentUser->isSubscribedFor($match['id']))
					
					<div class="input-group input-group-lg">
						<span class="input-group-addon">
							{{ $match['match_type']['match_type'] }}
						</span>
						
						<span class="input-group-addon">
							{{ $match['location'] }}
						</span>
						
						<span class="input-group-addon">
							{{ $match['date'] }}
						</span>

						<span class="input-group-addon ">
							{{ link_to_route(	'subsciption_path', 'Subscribe', 
												['match_id' => $match['id'], 'player_id' => $currentUser['id']], 
												['class' => 'btn btn-success']) }}
					
							@if ($currentUser->isAdmin())
								{{ link_to_action('MatchesController@destroy', 'Remove', [$match['id']], ['class' => 'btn btn-danger']) }}
							@endif
						</span>
					</div>
					<hr/>
				@endif
			@empty
				<h2>There are no matches that you can take place in!</h2>
			@endforelse
		</div>
		@if ($currentUser->isAdmin())
			<div class="well">
				@include('admin.partials.addMatch')
			</div>
		@endif
	</div>
</div>	
@stop