<!-- Extending master page -->

@extends('master')

<!-- Providing page title -->
@section('title')
	Mero Ticket::Admin - Add Privacy Policy
@stop

<!-- Adding active class -->
@section('privacy-policy')
	active
@stop

@section('add-privacy-policy');
	active
@stop
<!-- providing page content -->
@section('content')
	<div class="container">	
		<legend>Add Privacy Policy</legend>
    	<h4>Please give the correct information</h4>
    	<hr>
		@if(Session::get('message'))
			<div class="alert alert-dismissible alert-success">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-check-square-o" ></i></strong> {{Session::get('message')}}.
	        </div>
	    @elseif(Session::get('errormessage'))
	    	<div class="alert alert-dismissible alert-danger">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-exclamation-triangle"></i></strong> {{Session::get('errormessage')}}.
	        </div>
	    @else
		@endif
		
		{{ Form::open(array('class'=>'form-horizontal', 'route'=>'postAddPrivacyPolicy')) }}
			  
			    <div class="form-group">
			      <label  class="col-lg-2 control-label">Header</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" name="header">
			      </div>
			    </div>
			    
			    <div class="form-group">
			      <label for="textArea" class="col-lg-2 control-label">Description</label>
			      <div class="col-lg-10">
			        <textarea class="form-control" rows="3" name="description"></textarea>
			      </div>
			    </div>			    
			    
			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" class="btn btn-primary">Add Privacy Policy</button>
			      </div>
			    </div>
		
		{{ Form::close() }}
		
	</div>
@stop