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
            <h3 class="text-center">ATM's Information</h3><br>
            <div class="col-md-6">
            <form class="form-horizontal">
                <fieldset disabled>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Bank</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">koding nama Bank</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">koding nama ATM</p>
                        </div>
                    </div>
          
                    <div class="form-group">
                        <label for="inputLocation" class="col-sm-2 control-label">Location</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">koding Lokasi</p>
                        </div>
                    </div>
          
                    <div class="form-group">
                        <label for="inputFiture" class="col-sm-2 control-label">Fiture</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">koding Setor Tunai dan Tarik Tunai</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputFiture" class="col-sm-2 control-label">Nominal</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">koding 50ribu dll</p>
                        </div>
                    </div>
                </fieldset> 
            </form>
            
            </div>
        </div>
    </div>

@endsection