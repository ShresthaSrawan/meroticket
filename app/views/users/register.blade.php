@extends('layouts.default')

@section('title')

Mero Ticket | Register

@stop

@section('content')

<div class="container">
    <h1 class="page-title">Register on Mero Ticket</h1>
</div>

<div class="gap"></div>
<div class="container">

    <div class="row" data-gutter="60">
        <div class="col-md-4">
            <h3>Welcome to Traveler</h3>
            <p>Ultricies vestibulum egestas ad cras mollis nam dictumst netus leo facilisis justo maecenas molestie ipsum felis mus cubilia hendrerit vestibulum accumsan consectetur convallis vitae nec sapien diam justo lobortis aenean</p>
            <p>Lobortis tristique interdum curae luctus mattis nisl aenean diam suscipit</p>
        </div>
        <div class="col-md-4">
            <h3>New To Mero Ticket?</h3>
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
                <input class="btn btn-primary" type="submit" value="Sign up for Passanger" />
            {{ Form::close() }}
        </div>
    </div>
</div>
<div class="gap"></div>
@stop