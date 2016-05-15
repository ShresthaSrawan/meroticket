
@extends('layouts.default')

@section('title')

Mero Ticket | Search Result

@stop

<?php
$search_page = 1;
?>


@section('content')
<div class="container">
<ul class="breadcrumb">
    <li><a href="{{ route('home') }}">Home</a>
    </li>
    <li><a href="#">Search</a>
    </li>    
    <li class="active">Available Bus Result</li>
</ul>
<div class="mfp-with-anim mfp-hide mfp-dialog mfp-search-dialog" id="search-dialog">
    <h3>Search for Bus</h3>
    {{ Form::open() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-highlight"></i>
                    <label>Pick-up From</label>
                    <input class="typeahead form-control" placeholder="City" type="text" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-highlight"></i>
                    <label>Drop-off To</label>
                    <input class="typeahead form-control" placeholder="City" value="Same as Pick-up" type="text" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                            <label>Date</label>
                            <input class="form-control" name="start" type="text" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="input-daterange" data-date-format="MM d, D">
            <div class="row"></div>
        </div>
        <button class="btn btn-primary btn-lg" type="submit">Search for Available Bus</button>
    {{ Form::close() }}
</div>
<h3 class="booking-title">Following are the Available Bus</h3>
<hr>
<div class="col-md-9">

<ul class="booking-list">
    @if($results==null)
    <li><h3><i class="fa fa-exclamation-triangle"></i> There are no bus available.</h3></li>
    @else
    @foreach($results as $result)
        {{ date("l").', '.date("Y-m-d") }}
        <h4>-{{ ucwords($result['from']) }}- to -{{ ucwords($result['to']) }}-</h4>
        <hr>
        <li>
            <a class="booking-item" href="{{route('viewBookingDetails', $result['booking_details_id'])}}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="booking-item-car-img">
                            <img src="{{URL::to('/').'/'.$result['image']}}" alt="Image Alternative text" title="Image Title" height="50%" />
                            <p class="booking-item-car-title">{{ ucwords($result['companyname']) }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="booking-item-features booking-item-features-sign clearfix">
                                    <li rel="tooltip" data-placement="top" title="Total Passengers Capacity"><i class="fa fa-group"></i><span class="booking-item-feature-sign">x {{ $result['front_seat']+$result['back_seat']+$result['side_a']+$result['side_b'] }}</span>
                                    </li>
                                    <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 2</span>
                                    </li>
                                    <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 2</span>
                                    </li>
                                    <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>
                                    </li>
                                    <li rel="tooltip" data-placement="top" title="Diesel Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">diesel</span>
                                    </li>
                                </ul>
                                <ul class="booking-item-features booking-item-features-small clearfix">
                                    
                                    <li rel="tooltip" data-placement="top" title="Power Door Locks"><i class="im im-lock"></i>
                                    </li>
                                    <li rel="tooltip" data-placement="top" title="Stereo CD/MP3"><i class="im im-stereo"></i>
                                    </li>
                                    <li rel="tooltip" data-placement="top" title="Power Windows"><i class="im im-car-window"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="booking-item-features booking-item-features-dark">
                                    <li rel="tooltip" data-placement="top" title="Comapny Name">{{ ucwords($result['busname']).' - '. ucwords($result['bustypename']) }} 
                                    </li>
                                    <li rel="tooltip" data-placement="top" title="Shuttle Bus to Car"><i class="im im-bus"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"><span class="booking-item-price">Rs.{{ $result['ticket_price'] }}</span><span>/person</span><br>
                    
                    </div>
                </div>
            </a>
        </li>
    @endforeach
    @endif
</ul>

</div>
</div>
<div class="gap"></div>
</div>
@stop