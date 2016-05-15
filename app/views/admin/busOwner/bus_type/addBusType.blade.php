@extends('master')

@section('title')
  Mero Ticket::Admin - Add Bus Type
@stop

@section('dropdown-active-bus_type')
  active
@stop

@section('bus-type-class')
  active
@stop
@section('content')
  <h1 class="page-header">Adding Information of Bus Type</h1>
  
  @if(Session::get('message')!==null)
    <h3>{{Session::get('message')}}</h3>
    <a href="{{route('getAddBusType')}}"><button type="button" class="btn btn-primary">Add More</button></a>
  @else
    <div class="container">
      {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postAddBusType')) }}
        <fieldset>
          <legend>Please provide the correct information</legend>

          <div class="form-group">

            {{ Form::label('bustypename', 'Bus Type Name', array('class'=>'col-lg-2 control-label')) }}
            <!-- <label for="inputEmail" class="col-lg-2 control-label">Bus Type Name</label> -->
            <div class="col-lg-10">

              <input type="text" class="form-control" name="name" placeholder="e.g. Delux">
              
            </div>
          </div>             
          
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </fieldset>
      {{ Form::close() }}


    </div>
  @endif  
@stop