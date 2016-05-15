@extends('layouts.default')

@section('title')

Mero Ticket | Owner Registration 

@stop

@section('content')

<!-- <div class="container">
    <h1 class="page-title">Register on Mero Ticket</h1>
</div> -->

<div class="gap"></div>
<div class="container">

    <div class="row" data-gutter="60">
        <div class="col-md-4">
            <h3>Howdy, Owner!</h3>
            <h4>Please provide us the details of your company and we will call you for confirmation. Dhanyabad.</h4>
            
        </div>
        <div class="col-md-4" style="border-left:2px solid #d9534f;">
            
            @if(isset($message))
                <h5>{{$message}}</h5>
            @endif
                        
            {{ Form::open(array('route'=>'postOwnerRegistration')) }}
                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                    <label>Name of the Company</label>
                    <input name="companyname" class="form-control" placeholder="e.g. Makalu Yatayat Pvt. Ltd." type="text"
                        value="{{Input::old('companyname')}}"/>
                    <span class="error-display"><i style='color: red;'>  {{$errors->first('companyname')}}</i></span>
                </div>

                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                    <label>Name of the Owner</label>
                    <input name="ownername" class="form-control" placeholder="e.g. Suraj Yogi" type="text"
                           value="{{Input::old('ownername')}}"/>
                    <span class="error-display"><i style='color: red;'>  {{$errors->first('ownername')}}</i></span>
                </div>
                
                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                    <label>Contact Details</label>
                    <input name="contact_number" class="form-control" placeholder="e.g. 9804564668 or 015550611" type="text"
                           value="{{Input::old('contact_number')}}"/>
                    <span class="error-display"><i style='color: red;'>  {{$errors->first('contact_number')}}</i></span>
                </div>
                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                    <label>Address of the Company</label>
                    <input name="address" class="form-control" placeholder="e.g. Bagdol lalitpur" type="text"
                           value="{{Input::old('address')}}"/>
                    <span class="error-display"><i style='color: red;'>  {{$errors->first('address')}}</i></span>
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

                <input class="btn btn-primary" type="submit" value="Sign up for Owner" />
            {{ Form::close() }}
        </div>
    </div>
</div>
<div class="gap"></div>
@stop