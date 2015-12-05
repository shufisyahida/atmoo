@extends('layout')

@section('title', 'Home')

@section('header')
    <div class="navbar navbar-default navbar-top admin-navbar" role="navigation">
        <div class="container" id="headerContainer">
            <div class="row">
                <button type="button" class="btn btn-link"><h4>ATMoo</h4></button>
                    <ul class="nav navbar-nav navbar-right">
                        <div class="col-xs-4">    
                            <select class="form-control input-sm">
                                <option>ATM BNI</option>
                                <option>ATM Mandiri</option>
                                <option>ATM BRI</option>
                                <option>ATM CIMB Niaga</option>
                                <option>ATM CIMB Niaga Clicks</option>
                            </select>
                        </div>

                        <div class="col-xs-4">
                            <input class="form-control input-sm" type="text" placeholder="Write location">
                            </div>
                            
                            <button type="button" class="btn btn-link btn-lg">
                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                            </button>

                            <button type="button" class="btn btn-danger btn-sm">Search</button>

                        </ul>
                </div>

             </div>
        </div>

@endsection

@section('content')
    <div class="navbar navbar-default navbar-top admin-navbar" role="navigation">
            <div class="container" id="headerContainer"></div>
            <a href="#" class="visible-xs"><h4 id="adminBreadCrumb">Please Fill The Form</h4></a>  
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