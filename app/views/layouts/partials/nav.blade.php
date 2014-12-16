<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			{{ link_to_route('home', 'AFL', null, ['class' => 'navbar-brand']) }}
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				@if ($currentUser)
					<li>{{ link_to_route('matches_path', 'Matches') }}</li>
					@if ($currentUser->isAdmin())
						<li>{{ link_to_route('players_path', 'Players') }}</li>
					@endif
				@endif
			</ul>

			<ul class="nav navbar-nav navbar-right">
				@if ($currentUser)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ $currentUser->username }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>{{ link_to_route('subsciptions_path', 'Subscriptions') }}	</li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li class="divider"></li>
							<li>{{ link_to_route('logout_path', 'Log Out') }}	</li>
						</ul>
					</li>
				@else
					<li>
						{{ link_to_route('login_path', 'Log In') }}	
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>
