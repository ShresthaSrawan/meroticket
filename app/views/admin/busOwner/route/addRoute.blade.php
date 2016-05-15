
<!-- extends the master page -->
@extends('master')

<!-- added active class to route -->
@section('dropdown-active-route')
	active
@stop

<!-- added active class to add route -->
@section('add-route-class')
	active
@stop

<!-- Adding content -->
@section('content')
	<div class="container">
		
		@if(Session::get('message')!==null)
	        <div class="alert alert-dismissible alert-success">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-check-square-o" ></i></strong> {{Session::get('message')}}.
	        </div>
	     @elseif(Session::get('errormessage')!==null)

	     	<div class="alert alert-dismissible alert-danger">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-exclamation-triangle"></i></strong> {{Session::get('errormessage')}}.
	        </div>

	     @endif

		{{ Form::open(array('class'=>'form-horizontal', 'route'=>'postAddRoute')) }}
			<fieldset>
			    <legend>Add Route</legend>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">From</label>
			      <div class="col-lg-6">
			      	
			      	<div class="form-group"><!-- Form group starts here -->				  
				        <div class="col-lg-6">
					        <select class="form-control" name="from">
					        	
					        	<option value="0" selected>Please Select the City</option>
					        	@foreach($cities as $city)
					        	<option value="{{$city['name']}}">{{$city['name']}}</option>
					        	@endforeach

					        </select>
		        		</div>
	        		</div><!-- End of form group -->

			        <!-- <input type="text" class="form-control" name="from" placeholder="e.g. Kathmandu"> -->
			      </div>
			    </div>
			    <div class="form-group">
			        <label class="col-lg-2 control-label">To</label>
			        <div class="col-lg-6">
				        <div class="form-group"><!-- Form group starts here -->					        
					        <div class="col-lg-6">
						        <select class="form-control" name="to">
						        	
						        	<option value="0" selected>Please Select the City</option>
						        	@foreach($cities as $city)
						        	<option value="{{$city['name']}}">{{$city['name']}}</option>
						        	@endforeach

						        </select>
			        		</div>
		        		</div><!-- End of form group -->
			        <!-- <input type="text" class="form-control" name="to" placeholder="e.g. Nepalgunj"> -->
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
@stop