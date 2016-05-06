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
        <li class="active">{{$bus['bus_name']}}</li>
    </ul>
    <div class="booking-item-details">

        <header class="booking-item-header">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="lh1em">{{$bus['bus_name']}}</h2>
                    <ul class="list list-inline text-small">
                        <li><a href="#"><i class="fa fa-envelope"></i> E-mail Car Agent</a>
                        </li>
                        <li><i class="fa fa-phone"></i> {{ $bus['contact_number'] }}</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <p class="booking-item-header-price"><small>price</small>  <span class="text-lg">Rs.{{ $bus['ticket_price'] }}</span>/person</p>
                </div>
            </div>
        </header>
        <div class="gap gap-small"></div>
        <div class="row row-wrap">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{asset('img/Maserati-GranTurismo-Sport-facelift.png')}}" alt="Image Alternative text" title="Image Title" />
                    </div>
                    <div class="col-md-7">
                        <div class="booking-item-price-calc">
                            <div class="row row-wrap">
<!--                                <div class="col-md-6">-->
<!--                                    <div class="checkbox">-->
<!--                                        <label>-->
<!--                                            <input class="i-check" type="checkbox" />Child Toddler Seat<span class="pull-right">$35</span>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label>-->
<!--                                            <input class="i-check" type="checkbox" />Ski Rack<span class="pull-right">$40</span>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label>-->
<!--                                            <input class="i-check" type="checkbox" />Infant Child Seat<span class="pull-right">$35</span>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label>-->
<!--                                            <input class="i-check" type="checkbox" />GPS Satellite<span class="pull-right">$100</span>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label>-->
<!--                                            <input class="i-check" type="checkbox" />Show Chains<span class="pull-right">$120</span>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="col-md-5">
                                    <ul class="list">
                                        <li>
                                            <p>Price Per Person <span>Rs.{{ $bus['ticket_price'] }}</span>
                                            </p>
                                        </li>

                                        <li>
                                            <p>Equipment <span>$<span id="car-equipment-total" data-value="0">0</span></span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>Rental Tolal <span>$<span id="car-total" data-value="490">490</span></span>
                                            </p>
                                        </li>
                                    </ul>
                                    <a href="{{route('seatselection', $bus['id'])}}" class="btn btn-primary">Continue with Booking</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-small">Arrive at your destination in style with this air-conditioned automatic. With room for 4 passengers and 2 pieces of luggage, it's ideal for small groups looking to get from A to B in comfort. Price can change at any moment so book now to avoid disappointment!</p>

                <hr>
                <div class="row row-wrap">
                    <div class="col-md-4">
                        <h5>Bus Features</h5>
                        <ul class="booking-item-features booking-item-features-expand clearfix">
                            <li><i class="fa fa-group"></i><span class="booking-item-feature-title">Total seat for {{$bus['total_seat']}} Passengers</span>
                            </li>
                            <li><i class="fa fa-bus"></i><span class="booking-item-feature-title">{{$bus['type']}}</span>
                            </li>
                            <li><i class="fa fa-male"></i><span class="booking-item-feature-title">{{$bus['reservation_limit']}} ticket/passengers</span>
                            </li>
                            <li><i class="im im-car-doors"></i><span class="booking-item-feature-title">2 Doors</span>
                            </li>
                            <li><i class="fa fa-briefcase"></i><span class="booking-item-feature-title">{{ $bus['laggage'] }} Pieces of Laggage/person</span>
                            </li>

                            <li><i class="im im-diesel"></i><span class="booking-item-feature-title">Gas Vehicle</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Default Equipment</h5>
                        <ul class="booking-item-features booking-item-features-expand clearfix">
                            <li><i class="im im-climate-control"></i><span class="booking-item-feature-title">Climate Control</span>
                            </li>

                            <li><i class="im im-stereo"></i><span class="booking-item-feature-title">Stereo CD/MP3 {{ $bus['music'] }}</span>
                            </li>

                            <li><i class="im im-car-window"></i><span class="booking-item-feature-title">Power Windows</span>
                            </li>
                            <li><i class="im im-fm"></i><span class="booking-item-feature-title">FM Radio</span>
                            </li>
                            <li><i class="im im-lock"></i><span class="booking-item-feature-title">Power Door Locks</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Pickup Features</h5>
                        <ul class="booking-item-features booking-item-features-expand booking-item-features-dark clearfix">

                            <li><i class="im im-meet"></i><span class="booking-item-feature-title">Meet and Greet</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
<!--            <div class="col-md-3">-->
<!--                <div class="booking-item-deails-date-location">-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <h5>Location:</h5>-->
<!--                            <p>New York: JFK International Airport Federal Circle Bldf. 312, Jamaica, NY (NY), United States, 11430</p>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <h5>Pick Up:</h5>-->
<!--                            <p><i class="fa fa-map-marker box-icon-inline box-icon-gray"></i>JFK International Airport</p>-->
<!--                            <p><i class="fa fa-calendar box-icon-inline box-icon-gray"></i>Sunday, April 13 2014</p>-->
<!--                            <p><i class="fa fa-clock-o box-icon-inline box-icon-gray"></i>12:00 AM</p>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <h5>Drop Off:</h5>-->
<!--                            <p><i class="fa fa-map-marker box-icon-inline box-icon-gray"></i>JFK International Airport</p>-->
<!--                            <p><i class="fa fa-calendar box-icon-inline box-icon-gray"></i>Sunday, April 20 2014</p>-->
<!--                            <p><i class="fa fa-clock-o box-icon-inline box-icon-gray"></i>12:00 AM</p>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <a href="#" class="btn btn-primary">Change Location & Date</a>-->
<!--                </div>-->
<!--                <div class="gap gap-small"></div>-->
<!--            </div>-->
        </div>
    </div>
</div>
@stop