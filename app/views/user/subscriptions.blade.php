@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="well">

			@if (count($subscriptions) > 0)
				<h3>Subscriptions</h3>
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
							@foreach ($subscriptions as $subscription)
								<tr>
									<td>{{ link_to_action('MatchesController@show', $subscription['match']['match_type']['match_type'], [$subscription['match']['id']] )  }}</td>	
									<td>{{ $subscription['match']['location'] }}</td>
									<td>{{ $subscription['match']['date'] }}</td>
									<td>{{ link_to_route('unsubsciption_path', 'Unsubscribe', $subscription['id'], ['class' => 'btn btn-danger']) }}</td>
								</tr>	
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<h4>There are no matches you've subscribed for!</h4>	
			@endif
		</div>
	</div>
</div>	
@stop