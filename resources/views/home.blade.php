@extends('layout')

@section('title', 'Home')

@section('content')
	<div style = "display:none"class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 10%">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			  	<div class="modal-body">
			    	<h4 class="text-center modal-title"><strong>Welcome to ATMoo<strong></h4>
			    	<h5 class="text-center">ATM when you can find anywhere anytime</h5>
			    	<div class="row" style="margin-top: 30px">
			    		<div class="col-md-2"></div>
				    	<div class="col-md-8">
				    		<a href="{{ url('/search') }}"><button type="button" class="btn btn-pink btn-lg btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search your ATM</button></a><br>
					    	<a href="{{ url ('/formadd') }}"><button type="button" class="btn btn-pink btn-lg btn-block"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add hidden ATM</button></a><br>
					    	<div class="col-md-offset-3">
					    		Are you admin? <a href="{{ url('/auth/login') }}">Login here!</a>	
					    	</div>
				    	</div>
				    	<div class="col-md-2"></div>
			    	</div>
			  	</div>
			</div>
		</div>
	</div>
	
	<div class="map-home" id="map"></div>
	<script type="text/javascript">
		// $(window).load(function(){
		// 	$('#myModal').modal({
		// 		show: true,
		// 		backdrop: 'static'
		// 	});
		// });
	</script>
	<script>
	var dest = "Jakarta Convention Center, Indonesia";
    //var directionsDisplay;
        // memanggil service Google Maps Direction
	//var directionsService = new google.maps.DirectionsService();
	//directionsDisplay = new google.maps.DirectionsRenderer();
		function initMap() {
		  var directionsService = new google.maps.DirectionsService;
		  var directionsDisplay = new google.maps.DirectionsRenderer;

		  var map = new google.maps.Map(document.getElementById('map'), {
    			zoom: 15,
    			center: {lat: -6.211544, lng:106.845172}

  		   });


  // Try HTML5 geolocation.
  		if (navigator.geolocation) {
    		navigator.geolocation.getCurrentPosition(function(position) {
      		var pos = {
        		lat: position.coords.latitude,
        		lng: position.coords.longitude
      		};

      		infoWindow.setPosition(pos);
      		infoWindow.setContent('Location found.');
      		map.setCenter(pos);
    		}, function() {
      			handleLocationError(true, infoWindow, map.getCenter());
    		});
  		} else {
    		// Browser doesn't support Geolocation
    		handleLocationError(false, infoWindow, map.getCenter());
  		}



		  directionsDisplay.setMap(map);

		  calculateAndDisplayRoute(directionsService, directionsDisplay);	
		}

		function calculateAndDisplayRoute(directionsService, directionsDisplay) {

		  directionsService.route({
		    origin: {lat: -6.249625, lng:106.990287},
		    //origin: markerorigin.getPosition(),
		    destination: dest,
		    travelMode: google.maps.TravelMode.DRIVING
		  }, function(response, status) {
		    if (status === google.maps.DirectionsStatus.OK) {
		      directionsDisplay.setDirections(response);
		    } else {
		      window.alert('Directions request failed due to ' + status);
		    }
		  });
		}

	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtnGid5CBfg2btXly-d5OXaNrp6DeeuCs 	
&signed_in=true&callback=initMap"
        async defe></script>
@endsection