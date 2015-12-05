@extends('layout')

@section('title', 'Home')

@section('content')
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
    			center: {lat: -6.367713, lng: 106.821228},
    			zoom: 12
  			});

  			var infoWindow = new google.maps.InfoWindow({map : map});

  			// if(navigator.geolocation) {
  			// 	navigator.geolocation.getCurrentPosition(function(position){
  			// 		var pos = {
  			// 			lat: position.coords.latitude,
  			// 			lng: position.corrds.longitude
  			// 		};

  			// 		infoWindow.setPosition(pos);
  			// 		infoWindow.setContent('Disini');
  			// 		map.setCenter(pos);
  			// 	}, function() {
  			// 		handleLocationError(true, infoWindow, map.getCenter());
  			// 	});
  			// } else {
  			// 	handleLocationError(false, infoWndow, map.getCenter());
  			// }
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