@include('layouts.partials.errors')

<h3>New Match</h3>	

{{ Form::open(['route' => 'match_path']) }}
	<div class="input-group">
		<span class="input-group-addon">
			{{ Form::label('matchType', 'Match Type:') }}
			{{ Form::select('match_type_id', $matchTypes, 2, ['class' => 'form-control']) }}
		</span>
		
		<span class="input-group-addon">
			{{ Form::label('location', 'Location:') }}
			{{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'location']) }}
		</span>
		
		<span class="input-group-addon">
			{{ Form::label('date', 'Date:') }}
			{{ Form::text('date', null, ['class' => 'form-control', 'id' => 'date']) }}	
		</span>

		<span class="input-group-addon">
			{{ Form::submit('Add match', ['class' => 'btn btn-success']) }}
		</span>
	</div>
{{ Form::close() }}


