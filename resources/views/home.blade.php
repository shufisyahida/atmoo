@extends('layout')

@section('title', 'Home')

@section('content')
	<div div="map-home" id="map"></div>
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
	</script>
@endsection