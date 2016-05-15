
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
                            <li>discover</li>
                            <li class="active">find new friends</li>
                            <li>have fun</li>
                            <li>explore</li>
                            <li>go</li>
                            <li>live</li>
                            <li>meet</li>
                            <li>run away</li>
                            <li>being lost</li>
                        </ul>
                    </div>
                    <div class="search-tabs search-tabs-bg search-tabs-bottom mb50">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li>
                                    <a href="#tab" data-toggle="tab">
                                        <i class="fa fa-bus"></i>
                                        <span>Bus</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab">
                                    <h2>Search for Available Bus</h2>
                                    {{ Form::open((array('route'=>'searchResult'))) }}
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-lg form-group-icon-left">
                                                            <div class="form-group">
                                                              <label>From</label>
                                                              <div>
                                                                <select class="form-control" name="from">
                                                                    <option>From</option>
                                                                    @foreach($results as $result)                                                                        
                                                                        <option value="{{$result['name']}}"><i class="fa fa-place"></i> {{ucwords($result['name'])}}</option>
                                                                    @endforeach
                                                                </select>
                                                              </div>
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-lg form-group-icon-left">
                                                            <div class="form-group">
                                                              <label>To</label>
                                                              <div >
                                                                <select class="form-control" name="to">
                                                                    <option>To</option>
                                                                    @foreach($results as $result)                                                                        
                                                                        <option value="{{$result['name']}}"><i class="fa fa-place"></i> {{ucwords($result['name'])}}</option>
                                                                    @endforeach
                                                                </select>
                                                              </div>
                                                            </div>
                                                        </div>                                                        
                                                    </div>                                
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-daterange" data-date-format="yyyy M d">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group form-group-lg form-group-icon-left"><i
                                                                    class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                <label>Date</label>
                                                                <input class="form-control" value="Date" name="date" data-provide="datepicker" id="mydate"/>
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

@stop
@section('bottom-script')
<script type="text/javascript">
$(document).ready(function(){
$('#mydate').datepicker({
    format: 'yyyy/mm/dd',
    startDate: '+2d'
})
});

</script>
@stop