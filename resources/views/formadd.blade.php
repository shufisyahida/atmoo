@extends('layout')

@section('title', 'Home')

@section('header')
    <div class="header">
        <div class="container" id="headerContainer">
            <div class="row">
                <button type="button" class="btn btn-link"><h4>ATMoo</h4></button>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="form">
        <div class="container" id="headerContainer"></div>
            <h4 class="text-center">Please Fill The Form</h4>
        </div>      
    </div>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">ATM's Name</label>
            <div class="col-xs-4">
                <input type="Name" class="form-control" id="inputName" placeholder="Write the Name of ATM">
            </div>
        </div>
  
        <div class="form-group">
            <label for="inputLocation" class="col-sm-2 control-label">ATM's Location</label>
            <div class="col-xs-4">
                <input type="Location" class="form-control" id="inputLocation" placeholder="Write the Location of ATM">
            </div>
        </div>
  
        <div class="form-group">
            <label for="inputFiture" class="col-sm-2 control-label">ATM's Fiture</label>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label class="checkbox-inline">
                        <input type="checkbox"> Setor Tunai
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox"> Tarik Tunai
                    </label>
                </div>
            </div>
        </div>
  
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Add ATM</button>
            </div>
        </div>
    </form>
@endsection