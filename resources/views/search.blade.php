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

function getLocation() {
    map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -6.307713, lng: 106.831228},
          zoom: 10        });

        var infoWindow = new google.maps.InfoWindow({map : map});
 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
                        var lat = position.coords.latitude;
                        var lng= position.coords.longitude;
                        addMarker(lat,lng,"You are here","Here");
                        
                }, function(error) { alert('ERROR(' + error.code + '): ' + error.message); });
            }else{
                alert('geolocation is unsupported?');
            }
            alert('alert 2: ' + lat + ', ' + lng);
        }

</script>
  <!-- mumus -->
	<script>
		var map;
		var markers = [];

		function initMap() {
		  	var depok = {lat: -6.367713, lng: 106.821228};

		  	map = new google.maps.Map(document.getElementById('map'), {
		    	zoom: 15,
		    	center: depok,
		    	mapTypeId: google.maps.MapTypeId.TERRAIN
			});

		  
			@foreach ($atms as $atm)
  				var lat = parseFloat({{$atm->lat}});
  				var lng = parseFloat({{$atm->lng}});
  				var location = {lat: lat, lng: lng}
  				var msg = "{{$atm->nama}} -"+" {{$atm->nama_atm}}";
          		var add = "{{$atm->alamat}}";
  				addMarker(location, msg, add);
  			@endforeach
		}

		// Adds a marker to the map and push to the array.
		function addMarker(location, msg, add) {
		  	var infoBank = new google.maps.InfoWindow();
      		var image = "{{asset('pin/location_2.png')}}";
			var marker = new google.maps.Marker({
				position: location,
				map: map,
        		icon: image,
				title: msg
			});
	      	google.maps.event.addListener(marker, 'click', function() {
	        	infoBank.setContent('<div><strong>' + msg + '</strong><br>' + 'Alamat: ' + add + '<br>' +'</div>');
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
					
			});
			
		}

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