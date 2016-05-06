@extends('layouts.default')

@section('title')

Mero Ticket | Search

@stop

<?php
$search_page = 1;
?>

@section('content')

<div class="container">
    <h1 class="page-title">Search Bus</h1>
</div>

<div class="container">
{{ Form::open((array('route'=>'search'))) }}
    <div class="input-daterange" data-date-format="yyyy M d">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>From</label>
                    <input class="typeahead form-control" placeholder="City or Airport" name="from" type="text" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>To</label>
                    <input class="typeahead form-control" placeholder="City or Airport" name="to" type="text" />
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
    </div>
    <input class="btn btn-primary mt10" type="submit" value="Search for Bus" />
{{ Form::close() }}
<div class="gap gap-small"></div>
<!--<h3 class="mb20">Popuplar Destinations</h3>-->
<!--<div class="row row-wrap">-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/gaviota_en_el_top_800x600.jpg" alt="Image Alternative text" title="Gaviota en el Top" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>New York City Hotels</h5>-->
<!--                        <p>67638 reviews</p>-->
<!--                        <p class="mb0">362 offers from $90</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/sydney_harbour_800x600.jpg" alt="Image Alternative text" title="Sydney Harbour" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Sydney Hotels</h5>-->
<!--                        <p>52617 reviews</p>-->
<!--                        <p class="mb0">600 offers from $97</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/street_800x600.jpg" alt="Image Alternative text" title="Street" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Disney World Hotels</h5>-->
<!--                        <p>72528 reviews</p>-->
<!--                        <p class="mb0">663 offers from $67</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/the_journey_home_400x300.jpg" alt="Image Alternative text" title="the journey home" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Seattle Hotels</h5>-->
<!--                        <p>52697 reviews</p>-->
<!--                        <p class="mb0">250 offers from $83</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/lack_of_blue_depresses_me_800x600.jpg" alt="Image Alternative text" title="lack of blue depresses me" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Miami Hotels</h5>-->
<!--                        <p>78696 reviews</p>-->
<!--                        <p class="mb0">474 offers from $98</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/waipio_valley_800x600.jpg" alt="Image Alternative text" title="waipio valley" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Sydney Hotels</h5>-->
<!--                        <p>53966 reviews</p>-->
<!--                        <p class="mb0">659 offers from $91</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/the_best_mode_of_transport_here_in_maldives_800x600.jpg" alt="Image Alternative text" title="the best mode of transport here in maldives" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Virginia Beach Hotels</h5>-->
<!--                        <p>52043 reviews</p>-->
<!--                        <p class="mb0">437 offers from $52</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/upper_lake_in_new_york_central_park_800x600.jpg" alt="Image Alternative text" title="Upper Lake in New York Central Park" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Atlantic City Hotels</h5>-->
<!--                        <p>79380 reviews</p>-->
<!--                        <p class="mb0">963 offers from $53</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/viva_las_vegas_800x600.jpg" alt="Image Alternative text" title="Viva Las Vegas" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Las Vegas</h5>-->
<!--                        <p>65278 reviews</p>-->
<!--                        <p class="mb0">861 offers from $77</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/el_inevitable_paso_del_tiempo_800x600.jpg" alt="Image Alternative text" title="El inevitable paso del tiempo" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Budapest</h5>-->
<!--                        <p>64388 reviews</p>-->
<!--                        <p class="mb0">925 offers from $52</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/new_york_at_an_angle_800x600.jpg" alt="Image Alternative text" title="new york at an angle" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Boston</h5>-->
<!--                        <p>78805 reviews</p>-->
<!--                        <p class="mb0">740 offers from $87</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <div class="thumb">-->
<!--            <a class="hover-img" href="#">-->
<!--                <img src="img/196_365_800x600.jpg" alt="Image Alternative text" title="196_365" />-->
<!--                <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">-->
<!--                    <div class="text-small">-->
<!--                        <h5>Paris</h5>-->
<!--                        <p>54140 reviews</p>-->
<!--                        <p class="mb0">340 offers from $94</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="gap"></div>
<!--<h3 class="mb20">Top Deals</h3>-->
<!--<div class="row row-wrap">-->
<!--<div class="col-md-3">-->
<!--    <div class="thumb">-->
<!--        <header class="thumb-header">-->
<!--            <a href="#">-->
<!--                <img src="img/Volvo-V40.png" alt="Image Alternative text" title="Image Title" />-->
<!--            </a>-->
<!--        </header>-->
<!--        <div class="thumb-caption">-->
<!--            <h5 class="thumb-title"><a class="text-darken" href="#">Volvo V40</a></h5><small>Midsize</small>-->
<!--            <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">-->
<!--                <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 5</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 5</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 1</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Electric Vehicle"><i class="im im-electric"></i>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <p class="text-darken mb0 text-color">$41<small> /day</small>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-md-3">-->
<!--    <div class="thumb">-->
<!--        <header class="thumb-header">-->
<!--            <a href="#">-->
<!--                <img src="img/Chevrolet-Camaro.png" alt="Image Alternative text" title="Image Title" />-->
<!--            </a>-->
<!--        </header>-->
<!--        <div class="thumb-caption">-->
<!--            <h5 class="thumb-title"><a class="text-darken" href="#">Chevrolet Camaro</a></h5><small>Stabdart</small>-->
<!--            <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">-->
<!--                <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 3</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 4</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 4</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Manual Transmission"><i class="im im-shift"></i><span class="booking-item-feature-sign">manual</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Electric Vehicle"><i class="im im-electric"></i>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <p class="text-darken mb0 text-color">$66<small> /day</small>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-md-3">-->
<!--    <div class="thumb">-->
<!--        <header class="thumb-header">-->
<!--            <a href="#">-->
<!--                <img src="img/Land-Rover-Range-Rover-Evoque.png" alt="Image Alternative text" title="Image Title" />-->
<!--            </a>-->
<!--        </header>-->
<!--        <div class="thumb-caption">-->
<!--            <h5 class="thumb-title"><a class="text-darken" href="#">Range Rover Evoque</a></h5><small>Crossover</small>-->
<!--            <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">-->
<!--                <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 5</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 4</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 5</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Electric Vehicle"><i class="im im-electric"></i>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <p class="text-darken mb0 text-color">$65<small> /day</small>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-md-3">-->
<!--    <div class="thumb">-->
<!--        <header class="thumb-header">-->
<!--            <a href="#">-->
<!--                <img src="img/Nissan-GT-R.png" alt="Image Alternative text" title="Image Title" />-->
<!--            </a>-->
<!--        </header>-->
<!--        <div class="thumb-caption">-->
<!--            <h5 class="thumb-title"><a class="text-darken" href="#">Nissan GT R</a></h5><small>Premium</small>-->
<!--            <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">-->
<!--                <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 3</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 3</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 1</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Diesel Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">diesel</span>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <p class="text-darken mb0 text-color">$38<small> /day</small>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-md-3">-->
<!--    <div class="thumb">-->
<!--        <header class="thumb-header">-->
<!--            <a href="#">-->
<!--                <img src="img/Porsche-Cayenne-Turbo-S.png" alt="Image Alternative text" title="Image Title" />-->
<!--            </a>-->
<!--        </header>-->
<!--        <div class="thumb-caption">-->
<!--            <h5 class="thumb-title"><a class="text-darken" href="#">Porsche Cayenne</a></h5><small>SUV</small>-->
<!--            <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">-->
<!--                <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 2</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 2</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 4</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Diesel Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">diesel</span>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <p class="text-darken mb0 text-color">$41<small> /day</small>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-md-3">-->
<!--    <div class="thumb">-->
<!--        <header class="thumb-header">-->
<!--            <a href="#">-->
<!--                <img src="img/Volkswagen-Polo-BlueGT.png" alt="Image Alternative text" title="Image Title" />-->
<!--            </a>-->
<!--        </header>-->
<!--        <div class="thumb-caption">-->
<!--            <h5 class="thumb-title"><a class="text-darken" href="#">Volkswagen Polo</a></h5><small>Economy</small>-->
<!--            <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">-->
<!--                <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 2</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 5</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 4</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Electric Vehicle"><i class="im im-electric"></i>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <p class="text-darken mb0 text-color">$62<small> /day</small>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-md-3">-->
<!--    <div class="thumb">-->
<!--        <header class="thumb-header">-->
<!--            <a href="#">-->
<!--                <img src="img/Audi-S8.png" alt="Image Alternative text" title="Image Title" />-->
<!--            </a>-->
<!--        </header>-->
<!--        <div class="thumb-caption">-->
<!--            <h5 class="thumb-title"><a class="text-darken" href="#">Audi S8</a></h5><small>Fullsize</small>-->
<!--            <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">-->
<!--                <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 6</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 4</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 2</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Hybrid Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">hybrid</span>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <p class="text-darken mb0 text-color">$65<small> /day</small>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-md-3">-->
<!--    <div class="thumb">-->
<!--        <header class="thumb-header">-->
<!--            <a href="#">-->
<!--                <img src="img/Honda-Civic.png" alt="Image Alternative text" title="Image Title" />-->
<!--            </a>-->
<!--        </header>-->
<!--        <div class="thumb-caption">-->
<!--            <h5 class="thumb-title"><a class="text-darken" href="#">Honda Civic</a></h5><small>Economy</small>-->
<!--            <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">-->
<!--                <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 2</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 3</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 1</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Manual Transmission"><i class="im im-shift"></i><span class="booking-item-feature-sign">manual</span>-->
<!--                </li>-->
<!--                <li rel="tooltip" data-placement="top" title="Diesel Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">diesel</span>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <p class="text-darken mb0 text-color">$66<small> /day</small>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
</div>
</div>
<div class="gap gap-small"></div>
</div>

@stop