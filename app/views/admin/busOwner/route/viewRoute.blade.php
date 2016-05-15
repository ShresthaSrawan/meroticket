
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

		@if($results!==null)			

		<h3>All Route</h3>
		<table class="table">
			<tr>
				<th>#</th>
				<th>From</th>
				<th>To</th>
				<th>Action</th>
			</tr>
			<?php $i=1?>        
        	@foreach($results as $result)
			<tr>
				<td>{{$i}}</td>
				<td>{{ucwords($result['from'])}}</td>
				<td>{{ucwords($result['to'])}}</td>
				<td>
					<a href="#editModal{{$result['id']}}" data-toggle="modal"><button type="submit" class="btn btn-primary" ><i class="fa fa-pencil"></i> Edit</button></a>
              
	              <!-- start Edit Model -->
	              <div class="modal" id="editModal{{$result['id']}}">
	                <div class="modal-dialog">
	                  <div class="modal-content">
	                    <div class="modal-header">
	                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                      <h4 class="modal-title"><i class="fa fa-pencil"></i> | Edit Route</h4>
	                    </div>
	                    <div class="modal-body">
	                      {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postEditRoute')) }}
	                        <fieldset>                          
	                          <div class="form-group">
	                            <label class="col-lg-2 control-label">From</label>
	                            <div class="col-lg-10">
	                              <input type="text" class="form-control" name="from" value="{{ucwords($result['from'])}}">
	                            </div>
	                          </div>          
	                          <input type="hidden" name="routeid" value="{{$result['id']}}">
	                          <div class="form-group">
	                            <label class="col-lg-2 control-label">To</label>
	                            <div class="col-lg-10">
	                              <input type="text" class="form-control" name="to" value="{{ucwords($result['to'])}}">
	                            </div>
	                          </div>	                                                     
	                        </fieldset>
	                      {{ Form::close() }}
	                    </div>
	                    <div class="modal-footer">
	                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                      <button type="submit" class="btn btn-primary">Save changes</button>
	                    </div>
	                  </div>
	                </div>
	              </div><!-- End of Edit Modal -->

	              <a href="#deleteModal{{$result['id']}}" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Trash</button></a>
	              {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteRoute')) }}
	              <!-- start Delete Model -->
	              <div class="modal" id="deleteModal{{$result['id']}}">
	                <div class="modal-dialog">
	                  <div class="modal-content">
	                    <div class="modal-header">
	                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                      <h4><i class="fa fa-exclamation-triangle"></i> Are you sure want to move "{{ucwords($result['from'])}}" to "{{ucwords($result['to'])}}" route to trash?</h4>                    
	                    </div>
	                    <input type="hidden" name="routeid" value="{{$result['id']}}">
	                    <div class="modal-footer">                      
	                      <button type="submit" class="btn btn-primary">Yes</button>
	                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	                    </div>
	                  </div>
	                </div>
	              </div><!-- End of Delete Modal -->
	              {{ Form::close() }}
				</td>
			</tr>
			<?php $i++?>
			@endforeach
		</table>
		@else
		<hr>
			<h3><i class="fa fa-exclamation-triangle"></i> You have not added any route yet. Please go and route first.</h3>
		
		@endif
	</div>
@stop