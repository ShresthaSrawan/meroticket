!-- Extending master page -->

@extends('master')

<!-- Providing page title -->
@section('title')
	Mero Ticket::Admin - Add Cities
@stop

<!-- Adding active class -->
@section('view-owner-class')
	active
@stop

<!-- providing page content -->
@section('content')
	<div class="container">	
		
		@if(Session::get('message')!==null)
			<div class="alert alert-dismissible alert-success">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-check-square-o" ></i></strong> {{Session::get('message')}}
	        </div>
	    @elseif(Session::get('errormessage')!==null)
	    	<div class="alert alert-dismissible alert-danger">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-exclamation-triangle"></i></strong> {{Session::get('errormessage')}}
	        </div>
		@endif
		<legend>Add Cities</legend>
    	<h4>Please give the correct information</h4>
    	<hr>
		{{ Form::open(array('class'=>'form-horizontal', 'route'=>'postAddCities')) }}
		  <fieldset>
		    
		    <div class="form-group">
		      <label class="col-lg-2 control-label">Name of the City</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" name="city" placeholder="e.g. Nepalgunj">
		        <span class="error-display"><i style='color: red;'>  {{$errors->first('city')}}</i></span>
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="submit" class="btn btn-primary">Add City</button>
		      </div>
		    </div>
		   </fieldset>
		 {{ Form::close() }}

	</div>
@stop