@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="well">

			<h3>Subscriptions</h3>

			@forelse ($subscriptions as $subscription)
				<div class="input-group input-group-lg">
					<span class="input-group-addon">
						{{ $subscription['match']['match_type']['match_type'] }}
					</span>
					
					<span class="input-group-addon">
						{{ $subscription['match']['location'] }}
					</span>
					
					<span class="input-group-addon">
						{{ $subscription['match']['date'] }}
					</span>

					<span class="input-group-addon ">
						{{ link_to_route(	'unsubsciption_path', 'Unsubscribe', $subscription['id'], ['class' => 'btn btn-danger']) }}
					</span>
				</div>
				<hr/>
			@empty
				<h4>There are no matches you've subscribed for!</h4>
			@endforelse
		</div>
	</div>
</div>	
@stop