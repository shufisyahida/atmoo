@extends('layout')

@section('title', 'Register')

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
            <h3 class="text-center">Admin's Register</h3><br>
               
                <form method="POST" action="{{url('/auth/register')}}">
    {!! csrf_field() !!}

    <div>
        Name
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
        </div>
    </div>
 
@endsection