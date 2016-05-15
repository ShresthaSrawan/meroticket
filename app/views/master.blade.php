<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

<!-- Navigation -->

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{route('home')}}">Mero Ticket</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">            
            <li></li>
            <li><a href="/logout"><button type="button" class="btn btn-default">Logout</button></a></li>
            <li></li>
          </ul>          
        </div>
      </div>
    </nav>

<!-- End of Navigation -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-pills nav-stacked">
            @if(Auth::admin()->id())

              <li class="{{ isset($admin_home_page)?'active':'' }}"><a href="{{route('adminDashboard')}}">Home</a></li>        
              
              <li class="dropdown {{ isset($bus_owner_page)?'active':'' }}">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Bus Owner <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="{{ isset($confirm_owner_page)?'active':'' }}"><a href="{{route('getConfirmationView')}}">Confirm Owner</a></li>
                  <li class="divider"></li>
                  <li class="{{ isset($view_owner_page)?'active':'' }}"><a href="{{route('viewAllOwner')}}">View All Owner</a></li>                
                </ul>
              </li>              
<!-- Navigation for Bus Owner ends here -->

<!-- Navigation of city starts here -->
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  City <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class=""><a href="{{route('getAddCities')}}">Add City</a></li>
                  <li class="divider"></li>
                  <li class=""><a href="{{route('getViewAddCities')}}">View/Edit City</a></li>                
                </ul>
              </li>
<!-- Navigation of city ends here -->

<!-- Navih=gation of terms and condition starts here -->
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Terms and Condition <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class=""><a href="{{ route('getTermsAndCondition') }}">Add</a></li>
                  <li class="divider"></li>
                  <li class=""><a href="{{route('getViewTermsAndCondition')}}">View/Edit</a></li>                
                </ul>
              </li>

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Privacy Policy <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="@yield('add-privacy-policy')"><a href="{{ route('getAddPrivacyPolicy') }}">Add</a></li>
                  <li class="divider"></li>
                  <li class="@yield('view-privacy-policy')"><a href="{{route('getViewPrivacyPolicy')}}">View/Edit</a></li>                
                </ul>
              </li>

              <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Trash <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('getBusTrash') }}">Bus</a></li>
                <li class="divider"></li>
                <li><a href="{{route('getRouteTrash')}}">Route</a></li>
                <li class="divider"></li>
                <li><a href="{{route('getBusTypeTrash')}}">Bus Type</a></li>
                <li class="divider"></li>
                <li><a href="{{route('getCityTrash')}}">City</a></li>                
              </ul>
            </li>
            
            @else
            <li><a href="{{route('ownerDashboard')}}">Home <span class="sr-only">(current)</span></a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Bus Type <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class=""><a href="{{route('getAddBusType')}}">Add Bus Type</a>
                <li class="divider"></li>
                <li class=""><a href="{{route('viewBusType')}}">View/Edit Bus</a></li>                
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Bus <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class=""><a href="{{route('getAddBus')}}">Add Bus</a></li>
                <li class="divider"></li>
                <li class=""><a href="{{route('viewBus')}}">View/Edit Bus</a></li>                
              </ul>
            </li>
            
            <li class=""><a href="{{route('getAddFeature')}}">Feature</a></li>                                

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Bus Feature <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class=""><a href="{{route('getAddBusFeature')}}">Add Bus Feature</a></li>
                <li class="divider"></li>
                <li class=""><a href="{{route('viewBusFeature')}}">View/Edit Bus Feature</a></li>                
              </ul>
            </li>            

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Route <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class=""><a href="{{route('getAddRoute')}}">Add Route</a></li>
                  <li class="divider"></li>
                  <li class=""><a href="{{route('getViewRoute')}}">View/Edit Route</a></li>                
                </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Booking Date <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class=""><a href="{{route('getAddBookingDate')}}">Set Booking Date</a></li>
                <li class="divider"></li>
                <li class=""><a href="{{route('viewBookingDate')}}">View/Edit Booking Date</a></li>                
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Booking<span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class=""><a href="{{route('viewBookingConfirmation')}}">Confirm Booking</a></li>
                <li class="divider"></li>                                
              </ul>
            </li>

            @endif            
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
  </body>
</html>
