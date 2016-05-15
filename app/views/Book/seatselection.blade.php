
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
        <li>{{$result['busname']}}</li>
    </ul>
    <div class="booking-item-details">
        <header class="booking-item-header">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="lh1em">{{ucwords($result['busname'])}}</h2>
                    <ul class="list list-inline text-small">
                        <li><a href="#"><i class="fa fa-envelope"></i> Contact Bus Company</a></li>
                        <li><i class="fa fa-phone"></i> {{ $result['contact_number'] }}</li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="gap gap-small"></div>
        <div class="row row-wrap">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{URL::to('/').'/'.$result['image']}}" alt="Image Alternative text" title="Image Title" />
                    </div>
                    <div class="col-md-7">
                        <div class="booking-item-price-calc">
                            <div class="row row-wrap">
                                @if(isset($errormessage))
                                    
                                    <div class="alert alert-dismissible alert-danger">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                      <strong><i class="fa fa-exclamation-triangle"></i></strong> {{$errormessage}}
                                    </div>
                                    
                                @endif

                                {{ Form::open(array('route'=>'postSelectSeat')) }}

                                    <h4>Fill up the following Information.</h4>
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="active"><a href="#tab-1" data-toggle="tab">Passanger</a>
                                            </li>
                                                                               
                                        </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-1">
                                            
                                            <p>Please fill up the following details</p>
                                            
                                            <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                <label>Adult(s)</label>
                                                <select name="adults" class="form-control">
                                                    <option value="0">0</option>
                                                    <option selected value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>                                         
                                                </select>                                         
                                            </div>

                                            <input type="hidden" value="{{ $bookingid }}" name="bookingid">
                                            <input type="hidden" value="{{$result['ticket_price']}}" name="ticket_price">
                                            <input type="hidden" value="{{$result['date']}}" name="date">

                                             <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                 <label>Student(s)</label>
                                                 <select name="student" class="form-control">
                                                     <option selected value="0">0</option>
                                                     <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                     <option value="4">4</option>
                                                     <option value="5">5</option>                                         
                                                 </select>                                         
                                             </div>

                                             <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                 <label>Kid(s)</label>
                                                 <select name="kids" class="form-control">
                                                     <option selected value="0">0</option>
                                                     <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                     <option value="4">4</option>
                                                     <option value="5">5</option>                                         
                                                 </select>                                         
                                             </div>

                                            <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                <label>Elder</label>
                                                <select name="old" class="form-control">
                                                    <option selected value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>                                         
                                                </select>                                         
                                            </div>

                                            <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                <label>How Much Loggage</label>
                                                <select name="luggage" class="form-control">
                                                    <option selected value="0">No Luggage</option>
                                                    <option value="below10">Below 10K.G.</option>
                                                    <option value="below50">Below 50K.G.</option>
                                                    <option value="below10">Below 100K.G.</option>
                                                    <option value="above100">Above 100K.G</option>                                                                                            
                                                </select>                                         
                                            </div>

                                    </div><!-- End of tab 1 -->                             
                                </div>
                            </div> 
                                    <br>
                                    <center><input class="btn btn-primary" type="submit" value="Next" /></center>
                                    {{ Form::close() }}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
<!-- 
-->
