<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Signika', serif;
		}
		.alert {
			margin-top: 16px;
		}
	</style>
	@yield('scripts')
</head>
<body>
	@include('partials.navbar')
	@yield('carousel')
	
	<div class="container">
		@include('partials.error')
		@yield('content')
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>