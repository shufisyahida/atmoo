@extends('layout')

@section('title', 'Home')

@section('header')
  <div class="header">
    <div class="container" id="headerContainer">
            <div class="row">
                <a href="{{ url ('/') }}"><button type="button" class="btn btn-link"><h4>ATMoo</h4></button></a>
                    <ul class="nav navbar-nav navbar-right">
                        <div class="col-md-4 col-sm-3" style= "padding-top:15px" >    
                            <input class="form-control input-sm" type="text" name="bank" id="bank" placeholder="Write bank name">
                        </div>

                        <div class="col-md-4 col-sm-3" style= "padding-top:15px">
                            <input class="form-control input-sm" type="text" name="location" id="location" placeholder="Write location">
                        </div>
                            
                        
                        <div class="col-xs-6 col-sm-3" style= "padding-top:15px">
                          <button type="button" class="btn btn-danger btn-sm">Search</button>
                        </div>
                    </ul>
            </div>

        </div>
  </div>


@endsection

@section('content')
     <button type="button" style="z-index:5000; position:absolute; top:70%" class="btn btn-warning btn-circle btn-xl"><i class="glyphicon glyphicon-map-marker"></i></button>
  
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

		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
    			center: {lat: -6.367713, lng: 106.821228},
    			zoom: 12
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

		function filter() {
			$.ajax({
				type: 'GET',
				url: '{{ url("/search/autocomplete") }}',
				data: {
					q: $('#bank').val()
				}
			}).done(function(response) {
				var availableTags = response;
				$( "#bank" ).autocomplete({
				      source: availableTags
				});
			});
		}

		
		

		filter();
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtnGid5CBfg2btXly-d5OXaNrp6DeeuCs 	
&signed_in=true&callback=initMap"
        async defe></script>
@endsection