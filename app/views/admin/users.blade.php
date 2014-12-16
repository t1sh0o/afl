@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="well">

			@if (count($users) > 0)

				<h3>All Users</h3>

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
							@foreach ($users as $user)
								<tr>
									<td>{{ $user['username'] }}</td>
									<td>{{ $user['player']['skill'] }}</td>
									<td>{{ $user['player']['matches_played'] }}</td>
									@if ($currentUser->isAdmin())
										<td>
											{{ link_to_action('PlayersController@increaseSkills', '+', [$user['player']['id']], ['class' => 'btn btn-success']) }} | 
											{{ link_to_action('PlayersController@decreaseSkills', '-', [$user['player']['id']], ['class' => 'btn btn-danger']) }}
										</td>
									@endif
								</tr>	
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<h4>There are no users to be displayed!</h4>
			@endif
		</div>	
	</div>
</div>	
@stop