@extends('layout')

@section('title', 'Login')

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
            <h3 class="text-center">Admin's Login</h3><br>
                <div class="col-md-12">
                <form method="POST" action="{{url('/auth/login')}}" class="form-horizontal">
                    {!! csrf_field() !!}
                    
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-4">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-5">
                                <input type="checkbox" name="remember"> Remember Me
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-7 col-sm-10">
                                <button type="submit" class="btn btn-pink">Login</button>
                            </div>
                        </div>
                    
                </form>
                </div>
        </div>
    </div>
 
@endsection