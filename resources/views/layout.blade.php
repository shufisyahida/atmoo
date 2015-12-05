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

		<div class="navbar navbar-default navbar-top admin-navbar" role="navigation">
  			<div class="container" id="headerContainer">
    			<div class="row">
      				<button type="button" class="btn btn-link"><h4>ATMoo</h4></button>
      		    		<ul class="nav navbar-nav navbar-right">
      		    			<div class="col-xs-3">    
      		       				<select class="form-control input-sm">
  									<option>ATM BNI</option>
  									<option>ATM Mandiri</option>
  									<option>ATM BRI</option>
  									<option>ATM CIMB Niaga</option>
  									<option>ATM CIMB Niaga Clicks</option>
								</select>
				      		</div>

				      		<div class="col-xs-3">
				      			<input class="form-control input-sm" type="text" placeholder="Write location" readonly>
      						</div>
      						
      						<button type="button" class="btn btn-link btn-lg">
  								<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
							</button>

  							<button type="button" class="btn btn-primary btn-sm">Search</button>

  						</ul>
      		    </div>

 			 </div>
 		</div>

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