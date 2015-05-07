<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
    {{ HTML::style("css/bootstrap.min.css") }}
    {{ HTML::style("css/style.css") }}
	<title>Workout Buddy</title>
	@yield('js')
</head>
<body>
	@include('navigation')
	@yield('content') 
</body>
</html>
