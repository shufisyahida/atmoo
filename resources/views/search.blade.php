@extends('layout')

@section('title', 'Search')

@section('header')
  <div class="header">
    <div class="container" id="headerContainer">
            <div class="row">
                <span class="logo"><a href="{{url('/')}}">ATMoo</a></span>
                    <ul class="nav navbar-nav navbar-right">
                    	<form class="form-inline" style="padding-top:15px">
                    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    		<div class="form-group">
                    			<input class="form-control input-sm" type="text" name="location" size="70" id="location" placeholder="Write location">
                    		</div>
                    		<div class="form-group">
                    			<input class="form-control input-sm" type="text" name="bank" id="bank" size="20" placeholder="Write bank name">
                    		</div>
                    	</form>
                    </ul>
            </div>

        </div>
  </div>


@endsection

@section('content')

<button onclick="getLocation()" type="button" style="z-index:5000; position:absolute; top:70%" class="btn btn-warning btn-circle btn-xl"><img src="{{url('../resources/assets/img/clocation.png')}}" style="width:30px; height:30px"></button>

<div id="directions-panel" style="z-index: 1000; position: fixed; top: 30%; right: 50%; float:right; width:48%; height:600px; overflow:auto;"></div>
<div class="map" id="map"></div>
<script>
var map;
var markers = [];
var bounds;
var dest = "Jakarta Convention Center, Indonesia";
var lati;
var longi;

// $(document).ready(function(){
// 		$("#directions-panel").hide();
// });

function initMap() {
  	var depok = {lat: -6.367713, lng: 106.821228};

  	map = new google.maps.Map(document.getElementById('map'), {
    	zoom: 15,
    	center: depok,
    	mapTypeId: google.maps.MapTypeId.TERRAIN
	});

	$(window).load(function() {
		$.ajax({
			type: 'GET',
			url: '{{ url("/getAll") }}'
		}).done(function(response){
			console.log(response);
			for (var i = 0; i < response.length; i++) {
				var atm = response[i];
				var location = {lat: parseFloat(atm.lat), lng: parseFloat(atm.lng)};
				var message = atm.nama + " - " + atm.nama_atm;
				var address = atm.alamat;
				addMarker(location, message, address);	
			}
		})
	});
}

// Adds a marker to the map and push to the array.
function addMarker(location, message, address) {
	var infoBank = new google.maps.InfoWindow();
	var image = "{{asset('pin/location_2.png')}}";
	var marker = new google.maps.Marker({
		position: location,
		map: map,
		icon: image,
		title: message
	});
  	google.maps.event.addListener(marker, 'click', function() {
    	infoBank.setContent('\
    		<div>\
    			<strong>' + message + '</strong><br>\
    			Alamat: ' + address + '<br>\
    		</div>');
    	infoBank.open(map, this);
  	});

  	markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}

function handleLocationError(browserHasGeolocation, infowWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
}

$.ajax({
	type: 'GET',
	url: '{{ url("/getBankList") }}'
}).done(function(response) {
		var availableBanks = response;
		$( "#bank" ).autocomplete({
		      source: availableBanks
	});
});

$.ajax({
	type: 'GET',
	url: '{{ url("/getAtmList") }}'
}).done(function(response) {
		var availableATMs = response;
		$( "#location" ).autocomplete({
		      source: availableATMs,
		      autofocus: true
	});
});

function search() {
	
	$.ajax({
		dataType: 'json',
		type: 'GET',
		url: '{{ url("/searchResult") }}',
		data: {
			location: $('#location').val(),
			bank: $('#bank').val()
		}
	})
	.done(function(response) {
			console.log(response);
			deleteMarkers();
			if(response.hasOwnProperty('message')) {
				alert('Sorry, No Match Found.');
			}

			if (response[0].hasOwnProperty('unique')) {
				var data = response[0].unique;
				var location = {lat: Number(data.lat), lng: Number(data.lng)}
  				var message = data.nama + " -" + data.nama_atm;
          		var address = data.alamat;
          		//map.setCenter(location);
  				addMarker(location, message, address);
  				AutoCenter();
			}

			if(response[0].hasOwnProperty('location')) {
				var data = response;
				for(var i = 0; i < data.length; i++) {
					var location = {lat: Number(data.lat), lng: Number(data.lng)};
	  				var message = data.nama + " -" + data.nama_atm;
	          		var address = data.alamat;
	  				addMarker(location, message, address);
				}
			}

			if(response[0].hasOwnProperty('bank')) {
				var data = response;
				
				var center;
				for(var i = 0; i < data.length; i++) {

					var location = {lat: Number(data.lat), lng: Number(data.lng)};
					//if(i === 0) {center = location;}
	  				var message = data.nama + " -" + data.nama_atm;
	          		var address = data.alamat;
	  				
	  				addMarker(location, message, address);
				}
			}
			
			map.fitBounds(bounds);
	});
	
}

function AutoCenter() {
	var bounds = new google.maps.LatLngBounds();
	console.log("coba");
	for (var i = 0; i < markers.length; i++) {
		console.log(i);
		bounds.extend(markers[i].getPosition());
	}
	console.log('cobalago');
	map.fitBounds(bounds);
	console.log('cobalagooo');
}



// function getLocation() {
// 	var directionsService = new google.maps.DirectionsService;
// 	var directionsDisplay = new google.maps.DirectionsRenderer;
// 	map = new google.maps.Map(document.getElementById('map'), {
//       center: {lat: -6.307713, lng: 106.831228},
//       zoom: 13
//   	});

//     var infoWindow = new google.maps.InfoWindow({map : map});

// 	if (navigator.geolocation) {
//     	navigator.geolocation.getCurrentPosition(function(position){
            
//             var lat = position.coords.latitude;
//             var lng= position.coords.longitude;
            
//             directionsDisplay.setMap(map);
//             calculateAndDisplayRoute(directionsService, directionsDisplay, lat, lng);
                    
//             var location = {lat: lati, lng: longi}
//             addMarker(location,"You are here","Here");
//             getNear(lati,longi);
//             alert("coba");
//         }, function(error) { alert('ERROR(' + error.code + '): ' + error.message); });
//     } else {
//             alert('geolocation is unsupported?');
//     }
//     alert('alert 2: ' + lat + ', ' + lng);
// }

// function getNear(Latitude, Longitude) {

// 	var latitu = Latitude;
//     var longitu = Longitude;
//     $("#directions-panel").show();

//     var lat=[];
//     var lng=[];
//     var nama=[];
//     var namaatm=[];
//     var alamat=[];
//     $.ajax({
//         method: "GET",
//         url: "{{url('/near')}}",

//         dataType: 'json',
//         data: { 'lat': latitu, 'long':longitu  }
//     }).done(function(response){
//     	for(i in response) {
// 				lat[i]=parseFloat(response[i].lat);
// 			    lng[i]=parseFloat(response[i].lng);
//            	nama[i]=response[i].nama;
//            	namaatm[i]=response[i].nama_atm;
//            	alamat[i]=response[i].alamat;
//         }
//     });
      
// 	alert("We've Found Your Location");
// 	for (i = 0; i < 10; i++) { 
// 		var message = nama[i]+"-"+namaatm[i];
// 		var address = alamat[i];
// 		var location = {lat: lat[i], lng: lng[i]}
// 		addMarker(location, message, address);
// 	}
// }

// function calculateAndDisplayRoute(directionsService, directionsDisplay, lat, lng) {
// 	var markerorigin = new google.maps.Marker({
// 		position: new google.maps.LatLng(parseFloat(lat),parseFloat(lng)),
// 		map: map,
// 		title: "Origin",
// 		visible:false // kita ga perlu menampilkan markernya, jadi visibilitasnya kita set false
// 	});
// 	directionsService.route({
// 		origin: markerorigin.getPosition(),
// 		destination: dest,
// 		travelMode: google.maps.TravelMode.DRIVING,
// 		provideRouteAlternatives:true
// 	}, function(response, status) {
// 		if (status === google.maps.DirectionsStatus.OK) {
// 			directionsDisplay.setDirections(response);
// 		} else {
// 			window.alert('Directions request failed due to ' + status);
// 		}
// 	});	
// 	directionsDisplay.setMap(map);
// 	directionsDisplay.setPanel(document.getElementById('directions-panel'))
	
// 	var trafficLayer = new google.maps.TrafficLayer();
// 	trafficLayer.setMap(map);
// }		

$('#location').bind("enterKey",function(e){
	search();
});

$('#bank').bind("enterKey",function(e){
	search();
});

$('#location').keydown(function(e){
	if(e.keyCode==13){
		e.preventDefault();
		$(this).trigger("enterKey");
	}
});

$('#bank').keydown(function(e){
	if(e.keyCode==13){
		e.preventDefault();
		$(this).trigger("enterKey");
	}
});

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtnGid5CBfg2btXly-d5OXaNrp6DeeuCs 	
&signed_in=true&callback=initMap"
        async defe></script>


@endsection