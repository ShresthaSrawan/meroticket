
<!-- Extending master page -->
@extends('master')

<!-- Proving active class -->
@section('dropdown-active-ticket-booking')
	active
@stop

<!-- Seting up the title of the page -->
@section('title')
  Mero Ticket::Admin - Set Booking Date
@stop

<!-- providing active class -->
@section('booking-class')
	active
@stop

@section('content')
	<div class="container">
	<div class="alert alert-dismissible alert-success">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-exclamation-triangle"></i></strong> Booking Details has been successfully added.
	        </div>
		@if(Session::get('message')!==null)
			<div class="alert alert-dismissible alert-success">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong>Success!</strong> {{Session::get('message')}}
	        </div>
	    @elseif(Session::get('errormessage')!==null)
	    	<div class="alert alert-dismissible alert-danger">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong>Oh Snap!</strong> {{Session::get('errormessage')}}
	        </div>
		@endif

		@if($buses==null)
			<h3>You have not added any bus yet. Please add the bus first.</h3>
		@elseif($routes==null)
			<h3>You have not added any route yet. Please add the route first.</h3>
		@else
		<legend>Set Booking Date</legend>
		<h5>Please be informed that number you provide for discount will be later calculated in percentage whereas luggage will be simply calculated in Nepali currency.</h5>
		<hr>
		{{ Form::open(array('class'=>'form-horizontal', 'route'=>'postSetBookingDate')) }}
				<fieldset>					

					<div class="form-group">
						<label for="select" class="col-lg-2 control-label">Bus</label>
						<div class="col-lg-10">
							<select class="form-control" name="bus">
								<option value="0" selected>Choose the Bus</option>
								@foreach($buses as $bus)
									<option value="{{$bus['id']}}">{{$bus['name']}}</option>
								@endforeach
								
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="select" class="col-lg-2 control-label">Route</label>
						<div class="col-lg-10">
							<select class="form-control" name="route">
								<option value="0" selected="">Choose the Route</option>
								@foreach($routes as $route)
									<option value="{{$route['id']}}">-{{ucwords($route['from'])}}- to -{{ucwords($route['to'])}}-</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Date</label>
						<div class="col-lg-10">
							<input class="form-control" value="Date" name="date" data-provide="datepicker" id="mydate"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Time</label>
						<div class="col-lg-10">
							<input class="form-control" value="Time" name="time" data-provide="timepicker" id="mydate"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Ticket Price</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="ticket_price" placeholder="e.g. Rs. 1000">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Seat Limit</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="seatlimit" placeholder="e.g. 3">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Discount - Kid(%)</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="kid" placeholder="e.g. 20">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Discount - Student(%)</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="student" placeholder="e.g. 10">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Discount - Elder(%)</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="old" placeholder="e.g. 35">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Luggage - Below 10 K.G.</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="below10" placeholder="e.g. Rs. 35">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Luggage - Below 50 K.G.</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="below50" placeholder="e.g. Rs. 35">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">Luggage - Below 100 K.G.</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="below100" placeholder="e.g. Rs. 35">
						</div>
					</div>

					<div class="form-group">
				      <div class="col-lg-10 col-lg-offset-2">
				        <button type="submit" class="btn btn-primary">Submit</button>
				      </div>
				    </div>

				</fieldset>
			</form>
		{{ Form::close() }}
		@endif
	</div>
@stop