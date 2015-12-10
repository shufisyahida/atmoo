@extends('layout')

@section('title', 'Admin Page')

@section('header')
    <div class="header">
        <div class="container" id="headerContainer">
            <span class="logo"><a href="{{url('/')}}">ATMoo</a></span>
            <ul class="nav navbar-nav navbar-right">
                @if (!Auth::guest())        
                     <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><font color="pink">Hello, <b>{{ Auth::user()->name }} </b></font><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                @endif     
            </ul>
        </div>
    </div>

@endsection

@section('content')
<div class="container">
    <div class="admin">
        <div 
        @if (Auth::guest())
        <br><br><br><br><br><h2 class="text-center"><strong>Admins'page</strong></h2>
            <h5 class="text-center">Please log in first to configure ATMoo!</h5>
            <div class="row" style="margin-top: 30px">
                <div class="col-md-offset-3">
                    <div class="col-md-4">
                        <a href="{{ url('/auth/login') }}"><button type="button" class="btn btn-pink btn-lg btn-block">Login as Admin</button></a><br>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url ('/') }}"><button type="button" class="btn btn-pink btn-lg btn-block">Go to ATMoo's Home</button></a>  
                    </div>
                </div>
            </div>
                  
        @else
        <br><h3 class="text-center">List Of ATMs</h3><br>
        
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Approved</a></li>
            <li><a data-toggle="tab" href="#menu1">Need Verification</a></li>
        </ul>

        @if(Session::has('msg'))
            <br><div class="alert alert-success">{{ Session::get('msg') }}</div>
        @endif

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>ATM: Approved</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Bank</td>
                            <td>Name</td>
                            <td>Address</td>
                            <td>Longitude</td>
                            <td>Latitude</d>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        @foreach($atm as $atm)
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>{{$atm->nama}}</td>
                            <td>{{$atm->nama_atm}}</td>
                            <td>{{$atm->alamat}}</td>
                            <td>{{$atm->lng}}</td>
                            <td>{{$atm->lat}}</d>
                            <td><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete" type="button">Delete</button></td>
                            <?php $i++; ?>
                            <!-- Modal -->
                              <div class="modal fade" id="delete" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Delete Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>Are you sure to delete {{$atm->nama}} - {{$atm->nama_atm}} ?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <a href="{{url('/delete/'.$atm->ida)}}"><button type="button" class="btn btn-success">Yes</button></a>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>ATM: Need Verification</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Bank</td>
                            <td>Name</td>
                            <td>Address</td>
                            <td>Longitude</td>
                            <td>Latitude</d>
                            <td>Verification</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $o = 1;?>
                        @foreach($atmv as $atm)
                        <tr>
                            <td><?php echo $o; ?></td>
                            <td>{{$atm->nama}}</td>
                            <td>{{$atm->nama_atm}}</td>
                            <td>{{$atm->alamat}}</td>
                            <td>{{$atm->lng}}</td>
                            <td>{{$atm->lat}}</d>
                            <td><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#verif" type="button">Verify</button></td>
                            <?php $o++; ?>
                            <!-- Modal -->
                              <div class="modal fade" id="verif" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Verify Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>Are you sure to verify {{$atm->nama}} - {{$atm->nama_atm}} ?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <a href="{{url('/edit/'.$atm->ida)}}"<button type="button" class="btn btn-success">Yes</button></a>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @endif
    </div>
</div>
@endsection