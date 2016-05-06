@extends('layouts.default')

@section('title')

Mero Ticket | Select Seat

@stop

@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a>
        </li>
        <li><a href="">Select Seat</a>
        </li>
        <li>{{$bus['bus_name']}}</li>
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
<!--                <div class="col-md-5">-->
<!--                    <p class="booking-item-header-price"><small>price</small>  <span class="text-lg">Rs.{{ $bus['ticket_price'] }}</span>/person</p>-->
<!--                </div>-->
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
<!--                                 <div class="col-md-6">-->
                                     {{ Form::open(array('route'=>'postRegister')) }}
                                     <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                         <label>First Name</label>
                                         <input name="firstname" class="form-control" placeholder="e.g. Suraj" type="text"
                                                value="{{Input::old('firstname')}}"/>
                                         <span class="error-display"><i style='color: red;'>  {{$errors->first('firstname')}}</i></span>
                                     </div>

                                     <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                         <label>Last Name</label>
                                         <input name="lastname" class="form-control" placeholder="e.g. Yogi" type="text"
                                                value="{{Input::old('lastname')}}"/>
                                         <span class="error-display"><i style='color: red;'>  {{$errors->first('lastname')}}</i></span>
                                     </div>

                                     <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
                                         <label>Email</label>
                                         {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'e.g. surajyogi@gmail.com')) }}
                                         <span class="error-display"><i style='color: red;'> {{$errors->first('email')}}</i></span>
                                     </div>

                                     <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                         <label>Password</label>
                                         {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Your secret password')) }}
                                         <span class="error-display"><i style='color: red;'>  {{$errors->first('password')}}</i></span>
                                     </div>

                                     <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                         <label>Password Confirmation</label>
                                         {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Your secret password')) }}
                                         <span class="error-display"><i style='color: red;'> {{$errors->first('password_confirmation')}}</i></span>
                                     </div>

                                    <div class="checkbox">
                                        <label>
                                            <input class="i-check" type="checkbox" />Child Toddler Seat<span class="pull-right">$35</span>
                                        </label>
                                        <label>
                                            <input class="i-check" type="checkbox" />
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input class="i-check" type="checkbox" />Ski Rack<span class="pull-right">$40</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input class="i-check" type="checkbox" />Infant Child Seat<span class="pull-right">$35</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input class="i-check" type="checkbox" />GPS Satellite<span class="pull-right">$100</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input class="i-check" type="checkbox" />Show Chains<span class="pull-right">$120</span>
                                        </label>
                                    </div>
                                     <br><input class="btn btn-primary" type="submit" value="Book Seat" />
                                     {{ Form::close() }}
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
<!--                <p class="text-small">Arrive at your destination in style with this air-conditioned automatic. With room for 4 passengers and 2 pieces of luggage, it's ideal for small groups looking to get from A to B in comfort. Price can change at any moment so book now to avoid disappointment!</p>-->

<!--                <hr>-->

            </div>
        </div>
    </div>
</div>
@stop