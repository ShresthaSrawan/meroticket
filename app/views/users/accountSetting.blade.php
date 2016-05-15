
dd('somethinf');
@extends('layouts.default')

@section('title')

Mero Ticket | Profile Setting

@stop

@section('content')
<div class="container">
    <h3>Hello {{ucwords(Auth::user()->get()->firstName.' '.Auth::user()->get()->lastName)}}, here is your booking records</h3>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <aside class="user-profile-sidebar">
                <div class="user-profile-avatar text-center">             
                    <p>Member Since May {{Auth::user()->get()->created_at}}</p>
                </div>
                <ul class="list user-profile-nav">
                    <li><a href="user-profile.html"><i class="fa fa-user"></i>Overview</a>
                    </li>
                    <li><a href="{{route('postEditUserProfile')}}"><i class="fa fa-cog"></i>Settings</a>
                    </li>
                    <li><a href="user-profile-booking-history.html"><i class="fa fa-clock-o"></i>Booking History</a>
                    </li>                    
                </ul>
            </aside>
        </div>
        <div class="col-md-9">            
            <div class="row">
                <div class="col-md-5">

                    {{ Form::open(array('route'=>'postEditUserProfile')) }}
                        <h4>Personal Infomation</h4>
                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
                            <label>First Name</label>

                            <input class="form-control" name="firstname" value="{{ $results['firstName'] }}" type="text" />
                            <span class="error-display"><i style='color: red;'>  {{$errors->first('firstname')}}</i></span>
                        </div>

                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
                            <label>Last Name</label>
                            <input class="form-control" name="lastname" value="{{ $results['lastName'] }}" type="text" />
                            <span class="error-display"><i style='color: red;'>  {{$errors->first('lastname')}}</i></span>
                        </div>

                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
                            <label>Username</label>
                            <input class="form-control" name="username" value="{{ $results['userName'] }}" type="text" />
                            <span class="error-display"><i style='color: red;'>  {{$errors->first('username')}}</i></span>
                        </div>

                        <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon"></i>
                            <label>E-mail</label>
                            <input class="form-control" name="email" value="{{ $results['email'] }}" type="text" />
                            <span class="error-display"><i style='color: red;'>  {{$errors->first('email')}}</i></span>
                        </div>
                        <input type="hidden" name="userid" value="{{$results['id']}}" >
                        <div class="gap gap-small"></div>
                        
                        <hr>
                        <input type="submit" class="btn btn-primary" value="Save Changes">
                    {{ Form::close() }}
                </div>
            </div>
        </div><!-- end of col-md-9 -->
    </div>
</div>

<div class="gap"></div>
@stop

