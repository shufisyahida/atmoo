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
            <div class="col-md-6 col-xs-offset-4">
            <form class="form-horizontal">
                <div class="control">
                    <label for="inputName" class="col-sm-2 control-label">Bank</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">nama</p>
                        </div>
                </div>

                <div class="control">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">ATM</p>
                    </div>
                </div>
          
                <div class="control">
                    <label for="inputName" class="col-sm-2 control-label">Lokasi</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">Lokasi</p>
                    </div>
                </div>
          
                <div class="control">
                    <label for="inputFiture" class="col-sm-2 control-label">Fiture</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">koding Setor Tunai dan Tarik Tunai</p>
                    </div>
                </div>

                <div class="control">
                    <label for="inputFiture" class="col-sm-2 control-label">Nominal</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">koding 50ribu dll</p>
                    </div>
                </div>
            </form>
            
            </div>
        </div>
    </div>

@endsection