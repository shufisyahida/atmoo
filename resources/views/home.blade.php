@extends('layout')

@section('title', 'Home')

@section('content')
	<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 10%">
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
		$(window).load(function(){
			$('#myModal').modal({
				show: true,
				backdrop: 'static'
			});
		});
	</script>
	<script>
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
    			center: {lat: -34.397, lng: 150.644},
    			zoom: 6
  			});

  			var infoWindow = new google.maps.InfoWindow({map : map});

  			if(navigator.geolocation) {
  				navigator.geolocation.getCurrentPosition(function(position){
  					var pos = {
  						lat: position.coords.latitude,
  						lng: position.corrds.longitude
  					};

  					infoWindow.setPosition(pos);
  					infoWindow.setContent('Disini');
  					map.setCenter(pos);
  				}, function() {
  					handleLocationError(true, infoWindow, map.getCenter());
  				});
  			} else {
  				handleLocationError(false, infoWndow, map.getCenter());
  			}
		}

		function handleLocationError(browserHasGeolocation, infowWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtnGid5CBfg2btXly-d5OXaNrp6DeeuCs 	
&signed_in=true&callback=initMap"
        async defe></script>
@endsection