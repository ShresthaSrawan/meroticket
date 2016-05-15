<!-- Extending master page -->
@extends('master')

<!-- Proving active class -->
@section('dropdown-active-bus-feature')
	active
@stop

<!-- Seting up the title of the page -->
@section('title')
  Mero Ticket::Admin - Add Bus Feature
@stop

<!-- providing active class -->
@section('bus-feature-class')
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
			
		@else

		@endif
		
			{{ Form::open(array('class'=>'form-horizontal', 'route'=>'postAddBusFeature')) }}

			  <fieldset>
			    <legend>Set Bus Feature</legend>
			    
			    <div class="form-group">
			      <label for="select" class="col-lg-2 control-label">Bus</label>
			      <div class="col-lg-6">
				        <select class="form-control" name="bus">
				        	
				        	<option value="0" selected>Please Select the Bus</option>
				        	@foreach($buses as $bus)
				        	<option value="{{$bus['id']}}">{{$bus['name']}}</option>
				        	@endforeach
				        </select>
	        		</div>
	        	</div>
	        	
	        	
	        	<div class="form-group">
			      <label for="select" class="col-lg-2 control-label">Feature</label>
			      <div class="col-lg-6">
				        <select class="form-control" name="feature">
				        	<option value="0" selected>Please Select the Bus Feature</option>
				        	@foreach($features as $feature)			        	
				        	<option value="{{$feature['id']}}">{{$feature['name']}}</option>
				        	@endforeach
				        </select>
	        		</div>
	        	</div>
	        	
			    
			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" class="btn btn-primary">Set Feature</button>
			      </div>
			    </div>
			   </fieldset>

			 {{ Form::close() }}
		 
	</div>
		
@stop