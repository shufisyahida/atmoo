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
<div id="directions-panel" style="height:80%; width:30%; float:left">
	<div style="overflow:auto; height: 100%" id="directions-panel2"></div>
</div>
<div class="map" id="map"></div>
<script>
var map;
var markers = [];
var dest;
var origin;
var lati;
var longi;

// $(document).ready(function(){
// 		$("#directions-panel").hide();
// });
$("#directions-panel").hide();
$("#getrute").hide();
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
				var jenis = atm.jenis;
				var nominal = atm.nominal;
				dest = address;
				addMarker(location, message, address, jenis, nominal);
			}
		})
	});
}

// Adds a marker to the map and push to the array.
function addMarker(location, message, address, jenis, nominal) {
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
    			Jenis: ' + jenis + '<br>\
    			Nominal: ' + nominal + '<br><br>\
    			<button onclick="getLocationSearch()" id="getrute" class="pull-right btn btn-xs btn-pink">Tunjukan Rute</button>\
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
	$("#getrute").show();
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
			deleteMarkers();
			if(response.hasOwnProperty('message')) {
				alert('Sorry, No Match Found.');
			}

			if (response[0].hasOwnProperty('unique')) {
				var data = response[0].unique;
				var location = {lat: Number(data.lat), lng: Number(data.lng)}
  				var message = data.nama + " -" + data.nama_atm;
          		var address = data.alamat;
          		var jenis = data.jenis;
          		var nominal = data.nominal;
          		dest = address;

  				addMarker(location, message, address, jenis, nominal);
			}

			if(response[0].hasOwnProperty('location')) {
				var data = response;
				var location = {lat: Number(data.lat), lng: Number(data.lng)}
  				var message = data.nama + " -" + data.nama_atm;
          		var address = data.alamat;
  				//addMarker(location, message, address);
			}

			if(response[0].hasOwnProperty('bank')) {
				var center;
				var bounds = new google.maps.LatLngBounds();
				
				for(var i = 0; i < response.length; i++) {
					var data = response[i]['bank'];
					console.log(data);
					console.log(Number(data.lat));
					var location = new google.maps.LatLng(parseFloat(data.lat),parseFloat(data.lng));
	  				var message = data.nama + " -" + data.nama_atm;
	          		var address = data.alamat;
	  				bounds.extend(location);
	  				addMarker(location, message, address, jenis, lokasi);
				}
				console.log(markers);
				map.fitBounds(bounds);
			}
	});
	
}

function getLocationSearch() {
	$("#directions-panel").show();
	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer;
    map = new google.maps.Map(document.getElementById('map'), {
        	center: {lat: -6.307713, lng: 106.831228},
        	zoom: 13        
    	});

    var infoWindow = new google.maps.InfoWindow({map : map});
 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
            var lat = position.coords.latitude;
            var lng= position.coords.longitude;
            directionsDisplay.setMap(map);
            origin = {lat: lat, lng: lng};
            calculateAndDisplayRoute2(directionsService, directionsDisplay, lat, lng);                        
        }, function(error) { alert('ERROR(' + error.code + '): ' + error.message); });
    } else {
        alert('geolocation is unsupported?');
    }
}

$('#current-origin').click(function(){
	if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
            origin = {lat: position.coords.latitude, lng: position.coords.longitude};
        }, function(error) { alert('ERROR(' + error.code + '): ' + error.message); });
    } else {
        alert('geolocation is unsupported?');
    }
    getLocationSearch();
});


function getLocation() {
	$("#getrute").hide();
	$("#directions-panel").show();
	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer;
    map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -6.307713, lng: 106.831228},
          zoom: 13        });

        var infoWindow = new google.maps.InfoWindow({map : map});
 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
                        var lat = position.coords.latitude;
                        var lng= position.coords.longitude;
                        getNear(lat,lng);
                        //addMarker(lat,lng,"You are here","Here");
                        directionsDisplay.setMap(map);
                        calculateAndDisplayRoute(directionsService, directionsDisplay, lat, lng);

                        
                }, function(error) { alert('ERROR(' + error.code + '): ' + error.message); });
            }else{
                alert('geolocation is unsupported?');
            }
            //alert('alert 2: ' + lat + ', ' + lng);
 
        }


function getNear(Latitude, Longitude) {

	var latitu = Latitude;
    var longitu = Longitude;
   

    var lat=[];
    var lng=[];
    var nama=[];
    var namaatm=[];
    var alamat=[];
    $.ajax({
        method: "GET",
        url: "{{url('/near')}}",

        dataType: 'json',
        data: { 'lat': latitu, 'long':longitu  }
    }).done(function(response){
    	dest =response[0].alamat;
    	for(i in response) {
				lat[i]=parseFloat(response[i].lat);
			    lng[i]=parseFloat(response[i].lng);
           	nama[i]=response[i].nama;
           	namaatm[i]=response[i].nama_atm;
           	alamat[i]=response[i].alamat;
        }
    });
      
	alert("We've Found Your Location");
	for (i = 14; i < 10; i++) { 
		var message = nama[i]+"-"+namaatm[i];
		var address = alamat[i];
		var location = {lat: lat[i], lng: lng[i]}
		addMarker(location, message, address);
	}
}

function calculateAndDisplayRoute2(directionsService, directionsDisplay) {
	//var position= new google.maps.LatLng(parseFloat(lat),parseFloat(lng));
	var markerorigin = new google.maps.Marker({
        position: origin,
        map: map,
        title: "Origin",
        visible:false // kita ga perlu menampilkan markernya, jadi visibilitasnya kita set false
	});
	directionsService.route({
	    origin: markerorigin.getPosition(),
	    destination: dest,
	    travelMode: google.maps.TravelMode.DRIVING,
	    provideRouteAlternatives:true
	}, function(response, status) {
	    if (status === google.maps.DirectionsStatus.OK) {
	      	directionsDisplay.setDirections(response);
	    } else {
	      	window.alert('Directions request failed due to ' + status);
	    }
	});

	// menampiklkan rute pada peta dan juga direction panel sebagai petunjuk text
	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById('directions-panel2'))
	// menampilkan layer traffic atau lalu-lintas pada peta
	var trafficLayer = new google.maps.TrafficLayer();
	trafficLayer.setMap(map);
}	

function calculateAndDisplayRoute(directionsService, directionsDisplay, lat, lng) {
		  //var position= new google.maps.LatLng(parseFloat(lat),parseFloat(lng));
		  var markerorigin = new google.maps.Marker({
	           position: new google.maps.LatLng(parseFloat(lat),parseFloat(lng)),
	           map: map,
	           title: "Origin",
	           visible:false // kita ga perlu menampilkan markernya, jadi visibilitasnya kita set false
		});
		  directionsService.route({
		    origin: markerorigin.getPosition(),
		    //origin: markerorigin.getPosition(),
		    destination: dest,
		    travelMode: google.maps.TravelMode.DRIVING,
		    provideRouteAlternatives:true
		  }, function(response, status) {
		    if (status === google.maps.DirectionsStatus.OK) {
		      directionsDisplay.setDirections(response);
		    } else {
		      window.alert('Directions request failed due to ' + status);
		    }
		  });

		  		// menampiklkan rute pada peta dan juga direction panel sebagai petunjuk text
			  	directionsDisplay.setMap(map);
		  		directionsDisplay.setPanel(document.getElementById('directions-panel'))
		  			  		// menampilkan layer traffic atau lalu-lintas pada peta
		  		var trafficLayer = new google.maps.TrafficLayer();
  				trafficLayer.setMap(map);
		}	

$('#location').bind("enterKey",function(e){
	$("#directions-panel").css("display","none");
	search();
});

$('#bank').bind("enterKey",function(e){
	$("#directions-panel").css("display","none");
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