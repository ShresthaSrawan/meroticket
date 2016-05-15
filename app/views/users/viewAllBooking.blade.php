
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
                    <li><a href="{{route('viewUserBookingHistory')}}"><i class="fa fa-clock-o"></i>Booking History</a>
                    </li>                    
                </ul>
            </aside>
        </div>
        <div class="col-md-9">            
            <div class="row">
                <div class="col-md-5">
                @if(isset('errormessage'))
                    <h4>Booking is not made yet. :(</h4>
                @else
                    <table>
                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Total Passenger</th>
                            <th>Total Price</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <?php $i=1;?>
                            @foreach($results as $result)
                                <td>{{$i}}</td>
                                <td>{{ucwords($result['from'])}}</td>
                                <td>{{ucwords($result['to'])}}</td>
                                <td>{{$result['total_passenger']}}</td>
                                <td>{{$result['total_price']}}</td>
                                <td>{{$result['date']}}</td>
                                <td>
                                    Pending
                                </td>
                            @endforeach
                            <?php $i++;?>
                        </tr>
                    </table>
                @endif    
                </div>
            </div>
        </div><!-- end of col-md-9 -->
    </div>
</div>

<div class="gap"></div>
@stop

