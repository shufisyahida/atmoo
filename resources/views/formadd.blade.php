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
            <form class="form-horizontal" action="{{url('/addAtm')}}" method="GET">
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Bank</label>
                    <div class="col-sm-10">
                        <input type="Name" class="form-control" id="bank" name="bank" placeholder="Write the Name of Bank">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="Name" class="form-control" id="inputName" name="nama" placeholder="Write the Name of ATM">
                    </div>
                </div>
          
                <div class="form-group">
                    <label for="inputLocation" class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="Location" class="form-control col-md-8" id="inputLocation" name="loc" placeholder="Write the Location of ATM">
                    </div>
                </div>
          
                <div class="form-group">
                    <label for="inputFiture" class="col-sm-2 control-label">Fiture</label>
                    <div class="col-sm-3">
                        <label>
                            <input type="radio" id="setor" value="1" name="jenis"> Setor Tunai
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <label>
                            <input type="radio" id="tarik" value="2" name="jenis"> Tarik Tunai
                        </label>
                    </div>
                </div>

                <noms>
                    <div class="form-group">
                        <label for="inputFiture" class="col-sm-2 control-label">Nominal</label>
                        <div class="checkbox col-sm-5">
                            <input type="Location" class="form-control col-md-8" id="nominal" name="nom" placeholder="50000">
                        </div>
                    </div>
                </noms>

                <div class="form-group">
                    <div class="row">
                        <label for="inputLocation" class="col-sm-2 control-label">Latitude</label>
                        <div class="col-sm-3">
                            <input type="Name" class="form-control col-md-8" id="latLocation" name="lat" readonly>
                        </div>
                        <label for="inputLocation" class="col-sm-2 control-label">Longitude</label>
                        <div class="col-sm-3">
                            <input type="Name" class="form-control col-md-8" id="lngLocation" name="lng" readonly>
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
        $(document).ready(function(){
            $("noms").hide();

            $("#setor").click(function(event){
                $("noms").hide();
            });

            $("#tarik").click(function(event){
                $("noms").show();
            });
        });

        function initMap() {
            var image = "{{asset('pin/location_2.png')}}";
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -6.307713, lng: 106.831228},
                zoom: 12
            });

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(-6.307713, 106.831228),
                draggable:true,
                map: map,
                icon: image
            });
            marker.setMap(null);
            google.maps.event.addListener(map, 'click', function(event) {
                latt=parseFloat(event.latLng.lat());
                lngg=parseFloat(event.latLng.lng());
                document.getElementById('latLocation').value = latt;
                document.getElementById('lngLocation').value = lngg;

                marker.setPosition(new google.maps.LatLng(latt,lngg))

                marker.setMap(map);
        
            });
        }

        $.ajax({
            type: 'GET',
            url: '{{ url("/addBankList") }}'
        }).done(function(response) {
                console.log(response);
                var availableBanks = response;
                $( "#bank" ).autocomplete({
                      source: availableBanks
            });
        });

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtnGid5CBfg2btXly-d5OXaNrp6DeeuCs    
&signed_in=true&callback=initMap"
        async defe></script>
@endsection