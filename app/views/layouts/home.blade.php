@extends('layouts.default')

@section('title')
Mero Ticket | Home


@stop

<?php
$home_page = 1;
?>

@section('content')

<!-- TOP AREA -->
<div class="top-area show-onload">
<div class="bg-holder full">
<div class="bg-front full-height bg-front-mob-rel">
<div class="container full-height">
<div class="rel full-height">
<div class="tagline visible-lg" id="tagline"><span>It's time to</span>
    <ul>
        <li>relax</li>
        <li>play</li>
        <li>discover</li>
        <li>find new friends</li>
        <li>have fun</li>
        <li>explore</li>
        <li>go</li>
        <li>live</li>
        <li>meet</li>
        <li>run away</li>
        <li class="active">being lost</li>
    </ul>
</div>
<div class="search-tabs search-tabs-bg search-tabs-bottom mb50">
<div class="tabbable">
<ul class="nav nav-tabs" id="myTab">
    <li>
        <a href="#tab-4" data-toggle="tab">
            <i class="fa fa-bus"></i>
            <span>Bus</span>
        </a>
    </li>

</ul>
<div class="tab-content">
<div class="tab-pane fade in active" id="tab-4">
    <h2>Search for Available Bus</h2>

    {{ Form::open((array('route'=>'search'))) }}
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg form-group-icon-left"><i
                                class="fa fa-map-marker input-icon"></i>
                            <label>From</label>
                            <input class="typeahead form-control" placeholder="City" type="text" name='from'/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg form-group-icon-left"><i
                                class="fa fa-map-marker input-icon"></i>
                            <label>To</label>
                            <input class="typeahead form-control" placeholder="City" type="text" name="to"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-daterange" data-date-format="yyyy M d">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-lg form-group-icon-left"><i
                                    class="fa fa-calendar input-icon input-icon-highlight"></i>
                                <label>Date</label>
<!--                                {{ Form::Label('Date') }}-->
                                <input class="form-control" name="start" type="text"/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-lg" type="submit">Search for Available Bus</button>
    {{ Form::close() }}
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<div class="owl-carousel owl-slider owl-carousel-area visible-lg" id="owl-carousel-slider" data-nav="false">
    <div class="bg-holder full">
        <div class="bg-mask"></div>
        <div class="bg-img" style="background-image:url(img/Home/khaptad.jpg);"></div>
    </div>
    <div class="bg-holder full">
        <div class="bg-mask"></div>
        <div class="bg-img" style="background-image:url(img/196_365_2048x1365.jpg);"></div>
    </div>
    <div class="bg-holder full">
        <div class="bg-mask"></div>
        <div class="bg-img" style="background-image:url(img/el_inevitable_paso_del_tiempo_2048x2048.jpg);"></div>
    </div>
<!--    <div class="bg-holder full">-->
<!--        <div class="bg-mask"></div>-->
<!--        <div class="bg-img" style="background-image:url(img/viva_las_vegas_2048x1365.jpg);"></div>-->
<!--    </div>-->
</div>
<div class="bg-img hidden-lg" style="background-image:url(img/196_365_2048x1365.jpg);"></div>
<div class="bg-mask hidden-lg"></div>
</div>
</div>
<!-- END TOP AREA  -->

<div class="gap"></div>


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row row-wrap" data-gutter="120">
                <div class="col-md-4">
                    <div class="thumb">
                        <header class="thumb-header"><i
                                class="fa fa-briefcase box-icon-black round box-icon-big animate-icon-top-to-bottom"></i>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title"><a class="text-darken" href="#">Combine & Save</a></h5>

                            <p class="thumb-desc">You can save your money by using our discount offer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumb">
                        <header class="thumb-header"><i
                                class="fa fa-dollar box-icon-black round box-icon-big animate-icon-top-to-bottom"></i>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title"><a class="text-darken" href="#">Best Price Guarantee</a></h5>

                            <p class="thumb-desc">Mero Ticket offers the best price for our customer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumb">
                        <header class="thumb-header"><i
                                class="fa fa-lock box-icon-black round box-icon-big animate-icon-top-to-bottom"></i>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title"><a class="text-darken" href="#">Trust & Safety</a></h5>

                            <p class="thumb-desc">We always care about our customer's safety</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gap gap-small"></div>
</div>
<div class="bg-holder">
    <div class="bg-mask"></div>
    <div class="bg-img" style="background-image:url(img/hotel_porto_bay_liberdade_2048x1293.jpg);"></div>
    <div class="bg-content">
        <div class="container">
            <div class="gap gap-big text-center text-white">
                <h2 class="text-uc mb20">Last Minute Deal</h2>
                <ul class="icon-list list-inline-block mb0 last-minute-rating">
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                </ul>
                <h5 class="last-minute-title">Lake Side - Pokhara</h5>

                <p class="last-minute-date">Fri 14 Mar - Sun 16 Mar</p>

                <p class="mb20"><b>$12</b> / person</p><a class="btn btn-lg btn-white btn-ghost" href="#">Book Now <i
                        class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="gap"></div>
    <h2 class="text-center">Top Destinations</h2>

    <div class="gap">
        <div class="row row-wrap">
            <div class="col-md-3">
                <div class="thumb">
                    <header class="thumb-header">
                        <a class="hover-img curved" href="#">
                            <img src="{{ asset('img/people_on_the_beach_800x600.jpg') }}" alt="Image Alternative text"
                                 title="people on the beach"/>
                        </a>
                    </header>
                    <div class="img-left">
                        <img src="{{ asset('img/flags/32/gr.png') }}" alt="Image Alternative text" title="Image Title"/>
                    </div>
                    <div class="thumb-caption">
                        <h4 class="thumb-title"><a class="text-darken" href="#">Lumbini</a></h4>

                        <div class="thumb-caption">
                            <p class="thumb-desc">Interdum arcu lacus parturient mattis phasellus</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumb">
                    <header class="thumb-header">
                        <a class="hover-img curved" href="#">
                            <img src="{{ asset('img/196_365_800x600.jpg') }}" alt="Image Alternative text" title="196_365"/>
                        </a>
                    </header>
                    <div class="img-left">
                        <img src="{{ asset('img/flags/32/fr.png') }}" alt="Image Alternative text" title="Image Title"/>
                    </div>
                    <div class="thumb-caption">
                        <h4 class="thumb-title"><a class="text-darken" href="#">Pokhara</a></h4>

                        <div class="thumb-caption">
                            <p class="thumb-desc">Est cubilia est nulla sed aptent</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumb">
                    <header class="thumb-header">
                        <a class="hover-img curved" href="#">
                            <img src="{{ asset('img/el_inevitable_paso_del_tiempo_800x600.jpg') }}" alt="Image Alternative text"
                                 title="El inevitable paso del tiempo"/>
                        </a>
                    </header>
                    <div class="img-left">
                        <img src="{{ asset('img/flags/32/hu.png') }}" alt="Image Alternative text" title="Image Title"/>
                    </div>
                    <div class="thumb-caption">
                        <h4 class="thumb-title"><a class="text-darken" href="#">Mustang</a></h4>

                        <div class="thumb-caption">
                            <p class="thumb-desc">Ornare lobortis rhoncus pulvinar consectetur feugiat</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumb">
                    <header class="thumb-header">
                        <a class="hover-img curved" href="#">
                            <img src="{{ asset('img/upper_lake_in_new_york_central_park_800x600.jpg') }}" alt="Image Alternative text"
                                 title="Upper Lake in New York Central Park"/>
                        </a>
                    </header>
                    <div class="img-left">
                        <img src="{{ asset('img/flags/32/uhs.png') }}" alt="" title="Image Title"/>
                    </div>
                    <div class="thumb-caption">
                        <h4 class="thumb-title"><a class="text-darken" href="#">Far Western Nepal</a></h4>

                        <div class="thumb-caption">
                            <p class="thumb-desc">Hendrerit aliquet ornare rutrum fermentum facilisis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@stop