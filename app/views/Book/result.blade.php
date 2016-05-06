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
    <li><a href="#">Nepal</a>
    </li>
    <li><a href="#">Kathmandu (KTM)</a>
    </li>
    <li><a href="#">Kathmandu City</a>
    </li>
    <li class="active">Available Bus Result</li>
</ul>
<div class="mfp-with-anim mfp-hide mfp-dialog mfp-search-dialog" id="search-dialog">
    <h3>Search for Bus</h3>
    {{ Form::open((array('route'=>'search'))) }}
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
<h3 class="booking-title">Following are the Available Bus<small><a class="popup-text" href="#search-dialog" data-effect="mfp-zoom-out">Change search</a></small></h3>
<div class="booking-item-dates-change mb30">
    <form class="input-daterange" data-date-format="MM d, D">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>From</label>
                    <input class="typeahead form-control" value="city" placeholder="City" type="text" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>To</label>
                    <input class="typeahead form-control" value="City" placeholder="City" type="text" />
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
<!--                    <div class="col-md-6">-->
<!--                        <div class="form-group form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-hightlight"></i>-->
<!--                            <label>Time</label>-->
<!--                            <input class="time-pick form-control" value="12:00 AM" type="text" />-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
<!--            <div class="col-md-3">-->
<!--                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>-->
<!--                    <label>Drop Off Location</label>-->
<!--                    <input class="typeahead form-control" value="Same as Pickup" placeholder="City or Airport" type="text" />-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-6">-->
<!--                        <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>-->
<!--                            <label>Check out</label>-->
<!--                            <input class="form-control" name="end" type="text" />-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6">-->
<!--                        <div class="form-group form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-hightlight"></i>-->
<!--                            <label>Time</label>-->
<!--                            <input class="time-pick form-control" value="12:00 AM" type="text" />-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </form>
</div>
<div class="row">
<div class="col-md-3">
    <aside class="booking-filters text-white">
        <h3>Filter By:</h3>
        <ul class="list booking-filters-list">
            <li>
                <h5 class="booking-filters-title">Passengers Quantity</h5>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />2 Passengers (11)</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />3 Passengers (2)</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />4 Passengers (17)</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />4+ Passengers (60)</label>
                </div>
            </li>
<!--            <li>-->
<!--                <h5 class="booking-filters-title">Price </h5>-->
<!--                <input type="text" id="price-slider">-->
<!--            </li>-->
<!--            <li>-->
<!--                <h5 class="booking-filters-title">Car group</h5>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Economy (20)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Compact (20)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Midsize (11)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Stabdart (12)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Fullsize (5)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Premium/Luxury (3)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Minivan (5)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Crossover (10)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />SUV (12)</label>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <h5 class="booking-filters-title">Transmission</h5>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Automatic (80)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Manual (25)</label>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <h5 class="booking-filters-title">Engine</h5>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Gas (60)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Diesel (35)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Hybrid (22)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Electric (15)</label>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <h5 class="booking-filters-title">Equipment</h5>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Climate Control (47)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Air Conditioning (66)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Satellite Navigation (30)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Power Door Locks (35)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />FM Radio (70)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Stereo CD/MP3 (53)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Tilt Steering Wheel (42)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Power Windows (68)</label>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <h5 class="booking-filters-title">Pickup Options</h5>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Terminal Pickup (80)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Shuttle Bus to Car (25)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Meet and Greet (13)</label>-->
<!--                </div>-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input class="i-check" type="checkbox" />Car with Driver (7)</label>-->
<!--                </div>-->
<!--            </li>-->
        </ul>
    </aside>
</div>
<div class="col-md-9">
<div class="nav-drop booking-sort">
    <h5 class="booking-sort-title"><a href="#">Sort: Price (low to high)<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a></h5>
    <ul class="nav-drop-menu">
        <li><a href="#">Price (high to low)</a>
        </li>
        <li><a href="#">Car Name (A-Z)</a>
        </li>
        <li><a href="#">Car Name (Z-A)</a>
        </li>
        <li><a href="#">Car Type</a>
        </li>
    </ul>
</div>
<ul class="booking-list">
    @if($results==null)
    <li><h3>There are no bus available!!!!</h3></li>
    @else
    @foreach($results as $result)
        <li>
            <a class="booking-item" href="{{route('viewbus', $result['id'])}}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="booking-item-car-img">
                            <img src="img/Volkswagen-Touareg-Edition-X.png" alt="Image Alternative text" title="Image Title" />
                            <p class="booking-item-car-title">{{ $result['companyname'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="booking-item-features booking-item-features-sign clearfix">
                                    <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 2</span>
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
                                    <li rel="tooltip" data-placement="top" title="Satellite Navigation"><i class="im im-satellite"></i>
                                    </li>
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
                                    <li rel="tooltip" data-placement="top" title="Comapny Name">{{ $result['bus_name'] }}
                                    </li>
                                    <li rel="tooltip" data-placement="top" title="Shuttle Bus to Car"><i class="im im-bus"></i>
                                    </li>
<!--                                    <li rel="tooltip" data-placement="top" title="Car with Driver"><i class="im im-driver"></i>-->
<!--                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"><span class="booking-item-price">${{ $result['ticket_price'] }}</span><span>/person</span>

                    </div>
                </div>
            </a>
        </li>
    @endforeach
    @endif
</ul>
<!--    -->
<!--<div class="row">-->
<!--    <div class="col-md-6">-->
<!--        <p><small>108 rental cars in New York. &nbsp;&nbsp;Showing 1 – 15</small>-->
<!--        </p>-->
<!--        <ul class="pagination">-->
<!--            <li class="active"><a href="#">1</a>-->
<!--            </li>-->
<!--            <li><a href="#">2</a>-->
<!--            </li>-->
<!--            <li><a href="#">3</a>-->
<!--            </li>-->
<!--            <li><a href="#">4</a>-->
<!--            </li>-->
<!--            <li><a href="#">5</a>-->
<!--            </li>-->
<!--            <li><a href="#">6</a>-->
<!--            </li>-->
<!--            <li><a href="#">7</a>-->
<!--            </li>-->
<!--            <li class="dots">...</li>-->
<!--            <li><a href="#">43</a>-->
<!--            </li>-->
<!--            <li class="next"><a href="#">Next Page</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--    <div class="col-md-6 text-right">-->
<!--        <p>Not what you're looking for? <a class="popup-text" href="#search-dialog" data-effect="mfp-zoom-out">Try your search again</a>-->
<!--        </p>-->
<!---->
<!--    </div>-->
<!--</div>-->
</div>
</div>
<div class="gap"></div>
</div>
@stop