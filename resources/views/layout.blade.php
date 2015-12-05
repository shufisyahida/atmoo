<html>
	<head>

		<title>ATMoo - @yield('title')</title>

		<!-- Cuztomized CSS -->
		<link rel="stylesheet" href="http://localhost/atmoo/resources/assets/main.css">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	
	</head>
	<body>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

		@yield('header')

		

		@yield('content')
		

		<footer class="footer">
			<div class="container">
				<div class="col-md-8">
					<ul class="list-inline">
						<li><a href="#">HELP</a></li>
						<li><a href="#">CONTACTS</a></li>
						<li><a href="#">ABOUT</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<p class="text-right">Copyright by SIGoToCampus</p>
				</div>
			</div>
		</footer>

	</body>
</html>