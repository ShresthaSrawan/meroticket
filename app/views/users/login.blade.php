@extends('layouts.default')

@section('title')

Mero Ticket | Login

@stop

@section('content')
<div class="container">
    <h3 class="page-title">Sign In on Mero Ticket</h3>
</div>

<!--<div class="gap"></div>-->

<div class="container">

    <div class="row" data-gutter="60">
        <div class="col-md-4">
            <h5>Welcome to Mero Ticket</h5>
            <p>Mero Ticket is the online ticket booking portal for bus. It intends to ease the customer to reserve the seat.</p>
            <p>Please <a href="{{ route('register') }}" class="alert-link">Register</a> yourself for easy booking</p>
        </div>
        <div class="col-md-4">
            @if(Session::get('message'))
                <h2>{{Session::get('message')}}</h2>
                <hr>
            @endif

            <h3>Login</h3>
            <!-- <span class="error-display"><i style='color: red;'>  Username or Password is invalid :(</i></span> -->
            {{ Form::open(array('route'=>'postLogin')) }}
            <div class="form-group form-group-icon-left">
                <i class="fa fa-user input-icon input-icon-show"></i>
                {{Form::label('Email')}}
                {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'e.g. surajyogi@gmail.com','autocomplete'=>'off')) }}
                
            </div>
            <div class="form-group form-group-icon-left">
                <i class="fa fa-lock input-icon input-icon-show"></i>
                {{Form::label('Password')}}
                {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Your secret password')) }}
                
            </div>
            {{ Form::submit('Sign In', array('class'=>'btn btn-primary')) }}
            
            {{ Form::close() }}
        </div>

    </div>
</div>
<div class="gap"></div>
@stop