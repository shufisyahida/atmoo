@extends('layout')

@section('title', 'Home')

@section('header')
    <div class="header">
        <div class="container" id="headerContainer">
            <span class="logo"><a href="{{url('/')}}">ATMoo</a></span>
        </div>
    </div>

@endsection

@section('content')
    <div class="container map">
        <div class="card">
            <h3 class="text-center">Please Fill The Form</h3><br>
            <div class="col-md-6">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">ATM's Name</label>
                    <div class="col-sm-10">
                        <input type="Name" class="form-control" id="inputName" placeholder="Write the Name of ATM">
                    </div>
                </div>
          
                <div class="form-group">
                    <label for="inputLocation" class="col-sm-2 control-label">ATM's Location</label>
                    <div class="col-sm-10">
                        <input type="Location" class="form-control col-md-8" id="inputLocation" placeholder="Write the Location of ATM">
                    </div>
                </div>
          
                <div class="form-group">
                    <label for="inputFiture" class="col-sm-2 control-label">ATM's Fiture</label>
                    <div class="checkbox col-sm-10">
                        <label>
                            <input type="checkbox"> Setor Tunai
                        </label>
                        <label>
                            <input type="checkbox"> Tarik Tunai
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="inputLocation" class="col-sm-2 control-label">Latitude</label>
                        <div class="col-sm-3">
                            <input type="lat" class="form-control col-md-8" id="latLocation" disabled>
                        </div>
                        <label for="inputLocation" class="col-sm-2 control-label">Longitude</label>
                        <div class="col-sm-3">
                            <input type="lng" class="form-control col-md-8" id="lngLocation" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="padding-top: 10px">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-pink">Add ATM</button>
                    </div>
                </div>
            </form>
            
            </div>
            <div class="col-md-6">
                <div class="map" id="map"></div>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -6.307713, lng: 106.831228},
                zoom: 12
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