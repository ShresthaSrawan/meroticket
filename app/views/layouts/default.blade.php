<!DOCTYPE HTML>
<html>

<head>
    <title>@yield('title')</title>


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="html, Nepali Booking Website, book, reserve, ticket, booking website, nepali ticket reservation system" />
    <meta name="description" content="Mero Ticket - Book online ticket for bus">
    <meta name="owner" content="Suraj Yogi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyles.css')}}">

    <script src="{{asset('js/modernizr.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/switcher.css') }}" />
</head>

<body>

<header id="main-header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a class="logo" href="{{ URL::route('home')}}"><p>Mero Ticket</p>
                        <!--                    <img src="{{ asset('img/logo-invert.png') }}" alt="Image Alternative text" title="Image Title" />-->
                    </a>
                </div>
                <div class="col-md-3 col-md-offset-2"></div>
                <div class="col-md-4">
                    <div class="top-user-area clearfix">
                        <ul class="top-user-area-list list list-horizontal list-border">
                            @if(Auth::check())
                            <li class="top-user-area-avatar">
                                <a href="{{ URL::route('account')}}">
<!--                                    <img class="origin round" src="{{asset('img/amaze_40x40.jpg')}}" alt="Image Alternative text" title="AMaze" />-->
                                    Howdy, {{Auth::user()->firstName}}</a>
                            </li>
                            <li><a href="{{ URL::route('logout')}}">Sign Out</a>
                            </li>

                            @else
                            <li><a>Howdy, Guest</a></li>
                            <li><a href="{{URL::route('login')}}"><i class="fa fa-user"></i>&nbsp;&nbsp;Sign In</a></li>
                            <li><a href="{{URL::route('register')}}">Register</a></li>

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--
    ********************************************************************************************************************
                                             Mero Ticket::Navigation Bar
    ********************************************************************************************************************
    -->

    <div class="container">
        <div class="nav">
            <ul class="slimmenu" id="slimmenu">
                <li class="{{ isset($home_page)?'active':'' }}"><a href="{{ URL::route('home')}}">Home</a></li>
                <li class="{{ isset($search_page)?'active':'' }}"><a href="{{ URL::route('search') }}">Search Bus</a></li>
                <li class="{{ isset($blog_page)?'active':'' }}"><a href="hotels.html">Blog</a></li>
<!--                <li class="{{ isset($bus_page)?'active':'' }}"><a href="cars.html">Bus</a>-->
<!--                    <ul>-->
<!--                        <li><a href="car-details.html">Details</a>-->
<!--                        </li>-->
<!--                        <li><a href="car-payment.html">Payment</a>-->
<!--                            <ul>-->
<!--                                <li><a href="car-payment.html">Registered</a>-->
<!--                                </li>-->
<!--                                <li><a href="car-payment-registered-card.html">Existed Cards</a>-->
<!--                                </li>-->
<!--                                <li><a href="car-payment-unregistered.html">Unregistered</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="car-search.html">Search</a>-->
<!--                            <ul>-->
<!--                                <li><a href="car-search.html">Layout 1</a>-->
<!--                                </li>-->
<!--                                <li><a href="car-search-2.html">Layout 2</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="cars.html">Results</a>-->
<!--                            <ul>-->
<!--                                <li><a href="cars.html">Layout 1</a>-->
<!--                                </li>-->
<!--                                <li><a href="cars-results-2.html">Layout 2</a>-->
<!--                                </li>-->
<!--                                <li><a href="cars-results-3.html">Layout 3</a>-->
<!--                                </li>-->
<!--                                <li><a href="cars-results-4.html">Layout 4</a>-->
<!--                                </li>-->
<!--                                <li><a href="cars-results-5.html">Layout 5</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>
        </div>
    </div>

    <!--    ************************************Mero Ticket::End of Navigation Bar*********************************************-->

</header>

@yield('content')


<footer id="main-footer">
    <div class="container">
        <div class="row row-wrap">
            <div class="col-md-3">
                <a class="logo" href="{{ route('home') }}">
                    <p>Mero Ticket</p>
                    <!--                    <img src="{{ asset('img/logo-invert.png') }}" alt="Image Alternative text" title="Mero Ticket" />-->
                </a>
                <p class="mb20">Booking, reviews and advices on hotels, resorts, flights, vacation rentals, travel packages, and lots more!</p>
                <ul class="list list-horizontal list-space">
                    <li>
                        <a class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-linkedin box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-pinterest box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3">
                <h4>Newsletter</h4>
                <form>
                    <label>Enter your E-mail Address</label>
                    <input type="text" class="form-control">
                    <p class="mt5"><small>*We Never Send Spam</small>
                    </p>
                    <input type="submit" class="btn btn-primary" value="Subscribe">
                </form>
            </div>
            <div class="col-md-2">
                <ul class="list list-footer">
                    <li><a href="#">About US</a>
                    </li>
                    <li><a href="#">Press Centre</a>
                    </li>
                    <li><a href="#">Best Price Guarantee</a>
                    </li>
                    <li><a href="#">Travel News</a>
                    </li>
                    <li><a href="#">Jobs</a>
                    </li>
                    <li><a href="#">Privacy Policy</a>
                    </li>
                    <li><a href="#">Terms of Use</a>
                    </li>
                    <li><a href="#">Feedback</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Have Questions?</h4>
                <h4 class="text-color">+977-01-555-0611</h4>
                <h4><a href="#" class="text-color">support@traveler.com</a></h4>
                <p>24/7 Dedicated Customer Support</p>
            </div>

        </div>
    </div>
</footer>

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/slimmenu.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('js/nicescroll.js')}}"></script>
    <script src="{{asset('js/dropit.js')}}"></script>
    <script src="{{asset('js/ionrangeslider.js')}}"></script>
    <script src="{{asset('js/icheck.js')}}"></script>
    <script src="{{asset('js/fotorama.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <script src="{{asset('js/typeahead.js')}}"></script>
    <script src="{{asset('js/card-payment.js')}}"></script>
    <script src="{{asset('js/magnific.js')}}"></script>
    <script src="{{asset('js/owl-carousel.js')}}"></script>
    <script src="{{asset('js/fitvids.js')}}"></script>
    <script src="{{asset('js/tweet.js')}}"></script>
    <script src="{{asset('js/countdown.js')}}"></script>
    <script src="{{asset('js/gridrotator.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/switcher.js')}}"></script>
</div>
</body>



</html>



