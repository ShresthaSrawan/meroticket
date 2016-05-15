<!-- Extending master page -->
@extends('master')

<!-- Proving active class -->
@section('dropdown-active-booking')
	active
@stop

<!-- Seting up the title of the page -->
@section('title')
  Mero Ticket::Admin - Set Booking Date
@stop

<!-- providing active class -->
@section('confirm-booking-class')
	active
@stop

@section('content')
	<div class="container">
		@if(Session::get('message')!==null)
			<div class="alert alert-dismissible alert-success">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong>Success!</strong> {{Session::get('message')}}
	        </div>
	    @elseif(Session::get('errormessage')!==null)
	    	<div class="alert alert-dismissible alert-danger">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-exclamation-triangle"></i></strong> {{Session::get('errormessage')}}
	        </div>
		@endif
@stop