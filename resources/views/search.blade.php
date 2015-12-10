@extends('layout')

@section('title', 'Home')

@section('header')
  <div class="header">
    <div class="container" id="headerContainer">
            <div class="row">
                <span class="logo"><a href="{{url('/')}}">ATMoo</a></span>
                    <ul class="nav navbar-nav navbar-right">
                    	<form class="form-inline" style="padding-top:15px" method="GET" action="{{url('/searchResult')}}">
                    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    		<div class="form-group">
                    			<input class="form-control input-sm" type="text" name="location" size="70" id="location" placeholder="Write location">
                    		</div>
                    		<div class="form-group">
                    			<input class="form-control input-sm" type="text" name="bank" id="bank" size="20" placeholder="Write bank name">
                    		</div>
                    		<div class="form-group">
                    			<button type="submit" class="btn btn-pink btn-sm">Search</button>
                    		</div>
                    	</form>
                    </ul>
            </div>

        </div>
  </div>


@endsection

@section('content')

     <button onclick="getLocation()" type="button" style="z-index:5000; position:absolute; top:70%" class="btn btn-warning btn-circle btn-xl"><img src="{{url('../resources/assets/img/clocation.png')}}" style="width:30px; height:30px"></button>
    
 <div id="directions-panel" style="float:right; width:48%; height:600px; overflow:auto;"></div>
	<div class="map" id="map"></div>
	<script type="text/javascript">
		$(window).load(function(){
			$('#myModal').modal({
				show: true,
				backdrop: 'static'
			});
		});
	</script>

<script>
var map;
var dest = "Jakarta Convention Center, Indonesia";
function getLocation() {
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
                        //addMarker(lat,lng,"You are here","Here");
                        directionsDisplay.setMap(map);
                        calculateAndDisplayRoute(directionsService, directionsDisplay, lat, lng);
                        
                }, function(error) { alert('ERROR(' + error.code + '): ' + error.message); });
            }else{
                alert('geolocation is unsupported?');
            }
            //alert('alert 2: ' + lat + ', ' + lng);
 
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

</script>
  <!-- mumus -->
	<script>
		var map;

		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
    			center: {lat: -6.367713, lng: 106.821228},
    			zoom: 15
  			});

  			var infoWindow = new google.maps.InfoWindow({map : map});

  			@foreach ($atms as $atm)
  				var lat = parseFloat({{$atm->lat}});
  				var lng = parseFloat({{$atm->lng}});
  				var msg = "{{$atm->nama}} -"+" {{$atm->nama_atm}}";
          		var add = "{{$atm->alamat}}";
  				addMarker(lat, lng, msg, add);
  			@endforeach

		}

		function addMarker(lt, lg, msg, add){
	      	var infoBank = new google.maps.InfoWindow();
			var myLatLng = {lat: lt, lng: lg};
			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: msg
			});
	      	google.maps.event.addListener(marker, 'click', function() {
	        	infoBank.setContent('<div><strong>' + msg + '</strong><br>' + 'Alamat: ' + add + '<br>' +'</div>');
	        	infoBank.open(map, this);
	      	});
		}

		function handleLocationError(browserHasGeolocation, infowWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(browserHasGeolocation ?
	                    'Error: The Geolocation service failed.' :
	                    'Error: Your browser doesn\'t support geolocation.');
		}

		<!-- shufi -->
		$.ajax({
			type: 'GET',
			url: '{{ url("/getBankList") }}'
		}).done(function(response) {
				console.log(response);
				var availableBanks = response;
				$( "#bank" ).autocomplete({
				      source: availableBanks
			});
		});

		$.ajax({
			type: 'GET',
			url: '{{ url("/getAtmList") }}'
		}).done(function(response) {
				console.log(response);
				var availableATMs = response;
				$( "#location" ).autocomplete({
				      source: availableATMs
			});
		});
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtnGid5CBfg2btXly-d5OXaNrp6DeeuCs 	
&signed_in=true&callback=initMap"
        async defe></script>

@endsection