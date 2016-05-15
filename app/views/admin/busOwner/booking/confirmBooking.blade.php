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
	          <strong><i class="fa fa-check-square-o"></i></strong> {{Session::get('message')}}
	        </div>
	    @elseif(Session::get('errormessage')!==null)
	    	<div class="alert alert-dismissible alert-danger">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-exclamation-triangle"></i></strong> {{Session::get('errormessage')}}
	        </div>
		@endif
		<legend>Confirm Booking</legend>
		@if($results==null)
			<h4><i class="fa fa-exclamation-triangle"></i> There is no ticket to be confirmed.</h4>
		@else
		
		<table class="table">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>From</th>
				<th>To</th>
				<th>Date</th>
				<th>Ticket Price</th>
				<th>Total Passanger</th>
				<th>Seat</th>
				<th>Action</th>
			</tr>
			<?php $i=1; ?>
			@foreach($results as $result)
				<tr>
					<td>{{$i}}</td>
					<td>{{ucwords($result['firstname'])}} {{ucwords($result['lastname'])}}</td>
					<td>{{ucwords($result['from'])}}</td>
					<td>{{ucwords($result['to'])}}</td>
					<td>{{$result['date']}}</td>
					<td>{{$result['total_price']}}</td>
					<td>{{$result['total_passenger']}}</td>
					<td>{{$result['seat']}}</td>
					<td>
						  <a href="#confirm{{$result['booking_id']}}-MeroTicket" data-toggle="modal"><button type="submit" class="btn btn-primary" >Confirm</button></a>
              
			              <!-- start confirm Model -->
			              <div class="modal" id="confirm{{$result['booking_id']}}-MeroTicket">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                  {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postConfirmBooking')) }}
			                    <div class="modal-header">
	                      			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                      			<h4><i class="fa fa-exclamation-triangle"></i> | Are you sure want to confirm?</h4>                    
		                    	</div>
			                    
			                    <input type="hidden" name="bookingid" value="{{$result['booking_id']}}">         

			                    <div class="modal-footer">
			                      <button type="submit" class="btn btn-default">Yes</button>
			                      <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
			                    </div>
			                    {{ Form::close() }}
			                  </div>
			                </div>
			              </div><!-- End of confirm Modal -->

            			<a href="#cancel{{$result['booking_id']}}-MeroTicket" data-toggle="modal"><button type="submit" class="btn btn-primary">Cancel</button></a>
		            	{{ Form::open(array('class'=>'form-horizontal', 'route'=>'postCancelBooking')) }}
		            	<!-- start Delete Model -->
		            	<div class="modal" id="cancel{{$result['booking_id']}}-MeroTicket">
		                	<div class="modal-dialog">
		                  		<div class="modal-content">
		                    		<div class="modal-header">
		                      			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                      			<h4><i class="fa fa-exclamation-triangle"></i> | Are you sure want to Cancel?</h4>                    
		                    		</div>
		                    		<input type="hidden" name="bookingid" value="{{$result['booking_id']}}">
		                    		
		                    		<div class="modal-footer">                      
		                      			<button type="submit" class="btn btn-primary">Yes</button>
		                      			<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		                    		</div>
		                  		</div>
		                	</div>
		            	</div><!-- End of Delete Modal -->
            			{{ Form::close() }}
					</td>
				<?php $i++?>
				</tr>
			@endforeach
		</table>
		@endif
	</div>
@stop