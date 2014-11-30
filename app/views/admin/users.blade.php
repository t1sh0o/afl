@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-6">
	<ul>
		@forelse ($users as $user)
			<li>{{ $user['username'] }} | {{ $user['player']['skill'] }} | {{ $user['player']['matches_played'] }}</li>
		@empty
			There are no users to be displayed!
		@endforelse
	</ul>
	</div>
</div>	
@stop