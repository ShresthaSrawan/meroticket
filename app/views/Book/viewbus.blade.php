
@extends('layouts.default')

@section('title')

Mero Ticket | View Bus Details

@stop

@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a>
        </li>
        <li><a href="#">Search Bus</a>
        </li>
        <li class="active">{{$bus['busname']}}</li>
    </ul>
    <div class="booking-item-details">

        <header class="booking-item-header">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="lh1em">{{ucwords($bus['busname'])}} - {{ucwords($bus['from']).' to '.ucwords($bus['to']) }}</h2>
                    <ul class="list list-inline text-small">
                        <li><a href="#"><i class="fa fa-envelope"></i> Contact Bus Company</a>
                        </li>
                        <li><i class="fa fa-phone"></i> {{ $bus['contact_number'] }}</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <p class="booking-item-header-price"><small>price</small>  <span class="text-lg">Rs. {{$bus['ticket_price']}}
                    </span>/person</p>
                </div>
            </div>
        </header>
        <div class="gap gap-small"></div>
        <div class="row row-wrap">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{URL::to('/').'/'.$bus['image']}}" alt="{{$bus['busname']}}" title="{{$bus['busname']}}" height="250" />
                    </div>
                    <div class="col-md-7">
                        <div class="booking-item-price-calc">
                            <div class="row row-wrap">
                                <div class="col-md-8">
                                    <ul class="list">
                                        <li>
                                            <p>Price Per Person <span>Rs.{{$bus['ticket_price']}}</span>
                                            </p>
                                        </li>

                                        <li>
                                            <p>Total Seat <span>{{ $bus['front_seat']+$bus['back_seat']+$bus['side_a']+$bus['side_b'] }}</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>Discount - Kid<span>{{ $bus['kid'] }}%</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>Discount - Student<span>{{ $bus['student'] }}%</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>Discount - Elder<span>{{ $bus['elder'] }}%</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>Luggage Price - Below 10 K.G.<span>Rs. {{ $bus['below10'] }}</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>Luggage Price - Below 50 K.G.<span>Rs. {{ $bus['below50'] }}</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>Luggage Price - Below 100 K.G.<span>Rs. {{ $bus['below100'] }}</span>
                                            </p>
                                        </li>
                                        
                                        <li>
                                            <p><span></span>
                                            </p>
                                        </li>
                                        
                                    </ul>
                                    <a href="{{route('seatselection', $bookingid) }}" class="btn btn-primary">Continue with Booking</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="text-small">{{$bus['description']}} 

                <hr>
                <div class="row row-wrap">
                    <div class="col-md-4">
                        <h5>Bus Features</h5>
                        <ul class="booking-item-features booking-item-features-expand clearfix">
                            @foreach($features as $feature)
                            <li><i class="fa fa-check-square-o"></i> <span class="booking-item-feature-title">{{ucwords($feature['featurename'])}}</span></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Default Equipment</h5>
                        <ul class="booking-item-features booking-item-features-expand clearfix">
                            <li><i class="fa fa-check-square-o"></i><span class="booking-item-feature-title">Climate Control</span>
                            </li>
                            <li><i class="fa fa-check-square-o"></i><span class="booking-item-feature-title">Power Windows</span>
                            </li>
                            <li><i class="fa fa-check-square-o"></i><span class="booking-item-feature-title">FM Radio</span>
                            </li>
                            <li><i class="fa fa-check-square-o"></i><span class="booking-item-feature-title">Power Door Locks</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

