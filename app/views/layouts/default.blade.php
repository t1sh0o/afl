<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AFL</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
</head>
<body>

	@include('layouts.partials.nav')

	<div class="container">
		@include('flash::message')

		@yield('content')
	</div>
	
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#date').datetimepicker();
    });
</script>
</body>
</html>