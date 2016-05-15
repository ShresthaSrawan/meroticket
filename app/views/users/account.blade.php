@extends('layouts.default')

@section('title')

Mero Ticket | Profile

@stop

@section('content')
<div class="container">
    <h3>Hello {{ucwords(Auth::user()->get()->firstName)}}, here is your booking records</h3>
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
                    <li><a href="{{route('getEditUserProfile')}}"><i class="fa fa-cog"></i>Settings</a>
                    </li>
                    <li><a href="user-profile-booking-history.html"><i class="fa fa-clock-o"></i>Booking History</a>
                    </li>                    
                </ul>
            </aside>
        </div>
        <div class="col-md-9">
            <h4>Total Traveled</h4>
            <ul class="list list-inline user-profile-statictics mb30">
                <li><i class="fa fa-dashboard user-profile-statictics-icon"></i>
                    <h5>12540</h5>
                    <p>Miles</p>
                </li>                
                <li><i class="fa fa-building-o user-profile-statictics-icon"></i>
                    <h5>15</h5>
                    <p>Cityes</p>
                </li>
            </ul>
            <div id="map-canvas" style="width:100%; height:400px;"></div>
        </div>
    </div>
</div>

<div class="gap"></div>
@stop

