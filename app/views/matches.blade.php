@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="well">
			@if (count($matches) > 0)

				<h3>All Matches</h3>

				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Match type</th>
								<th>Match location</th>
								<th>Match date</th>
								<th>Commands</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($matches as $match)
								@if ( ! $currentUser->isSubscribedFor($match['id']))
									<tr>
										<td>{{ link_to_action('MatchesController@show', $match['match_type']['match_type'], [$match['id']] )  }}</td>
										<td>{{ $match['location'] }}</td>
										<td>{{ $match['date'] }}</td>
										<td>
											{{ link_to_route(	'subsciption_path', 'Subscribe', 
																['match_id' => $match['id'], 'user_id' => $currentUser['id']], 
																['class' => 'btn btn-success']) }}
									
											@if ($currentUser->isAdmin())
												{{ link_to_action('MatchesController@destroy', 'Remove', [$match['id']], ['class' => 'btn btn-danger']) }}
											@endif
										</td>
									</tr>	
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<h4>There are no matches that you can take place in!</h4>
			@endif
		</div>
		@if ($currentUser->isAdmin())
			<div class="well">
				@include('admin.partials.addMatch')
			</div>
		@endif
	</div>
</div>	
@stop