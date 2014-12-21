@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="well">

			@if (count($players) > 0)

				<h3>All Players</h3>

				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Username</th>
								<th>Skills</th>
								<th>Matches played</th>
								<th>Commands</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($players as $player)
								<tr>
									<td>{{ $player['user']['username'] }}</td>
									<td>{{ $player['skill'] }}</td>
									<td>{{ $player['matches_played'] }}</td>
									@if ($currentUser->isAdmin())
										<td>
											{{ link_to_route('update_player_path', '+', [$player['id'], 1], ['class' => 'btn btn-success']) }}
											{{ link_to_route('update_player_path', '-', [$player['id'], -1], ['class' => 'btn btn-danger']) }}
										</td>
									@endif
								</tr>	
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<h4>There are no players to be displayed!</h4>
			@endif
		</div>	
	</div>
</div>	
@stop