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
    var lati;
    var longi;

function getLocation() {
    map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -6.307713, lng: 106.831228},
          zoom: 10        });

        var infoWindow = new google.maps.InfoWindow({map : map});
 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
                         lati = position.coords.latitude;
                         longi= position.coords.longitude;
                        addMarker(lati,longi,"You are here","Here");
                        getNear(lati,longi);
                        
                }, function(error) { alert('ERROR(' + error.code + '): ' + error.message); });
            }else{
                alert('geolocation is unsupported?');
            }
            alert('alert 2: ' + lat + ', ' + lng);
        
       

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
                    data: { 'lat': latitu, 'long':longitu  },
                    success: function(response) {
                 		//alert(response);
                 		for(i in response) {

          					   lat[i]=parseFloat(response[i].lat);
          			       lng[i]=parseFloat(response[i].lng);
                       nama[i]=response[i].nama;
                       namaatm[i]=response[i].nama_atm;
                       alamat[i]=response[i].alamat;
          			       //addMarker(response[i].lat, response[i].lng, 0, 0);
                     }
             			}


                })
              //alert(lat);
              alert("We've Found Your Location");
              for (i = 0; i < 10; i++) { 
                var msg = nama[i]+"-"+namaatm[i];
                var add = alamat[i];
                addMarker(lat[i], lng[i], msg, add);
              }
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
      	var image = "{{asset('pin/location_2.png')}}";
			var myLatLng = {lat: lt, lng: lg};
			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
        icon: image,
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