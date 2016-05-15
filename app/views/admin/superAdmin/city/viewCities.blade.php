!-- Extending master page -->

@extends('master')

<!-- Providing page title -->
@section('title')
	Mero Ticket::Admin - View Cities
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
		@elseif(Session::get('errors'))
			<div class="alert alert-dismissible alert-danger">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-exclamation-triangle"></i></strong> {{$errors->first('name')}}.
	        </div>
		@endif
		<legend>View and Edit Cities</legend>
    	<h4>Please give the correct information</h4>
    	<hr>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Name of the City</th>
				<th>Action</th>
			</tr>
			<?php $i=1; ?>
			@foreach($results as $result)
			<tr>
				<td>{{$i}}</td>
				<td>{{$result['name']}}</td>
				<td>
					
	 				<a href="#editModal{{$result['name']}}" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button></a>
	 					<!-- start Edit Model -->
		              <div class="modal" id="editModal{{$result['name']}}">
		                <div class="modal-dialog">
		                  <div class="modal-content">
		                  {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postEditAddCity')) }}
		                    <div class="modal-header">
		                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                      <h4 class="modal-title"><i class="fa fa-pencil"></i> | Edit City</h4>
		                    </div>
		                    <div class="modal-body">
		                        <fieldset>

		                          <input type="hidden" name="id" value="{{$result['id']}}">                          
		                          
		                          <div class="form-group">
		                            <label class="col-lg-2 control-label">City Name</label>
		                            <div class="col-lg-10">
		                              <input type="text" class="form-control" name="city" value="{{ucwords($result['name'])}}">
		                            </div>
		                          </div>                                                       
		                        </fieldset>
		                      
		                    </div>
		                    <div class="modal-footer">
		                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                      <button type="submit" class="btn btn-primary">Save changes</button>
		                    </div>
		                    {{ Form::close() }}
		                  </div>
		                </div>
		              </div><!-- End of Edit Modal -->

		              <a href="#deleteModal" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Trash</button></a>
		              {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteAddCity')) }}
		              <!-- start Delete Model -->
		              <div class="modal" id="deleteModal">
		                <div class="modal-dialog">
		                  <div class="modal-content">
		                    <div class="modal-header">
		                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                      <h4><i class="fa fa-exclamation-triangle"></i> | Are you sure want to send it to trash?</h4>                    
		                    </div>

		                    <input type="hidden" name="cityid" value="{{$result['id']}}">
		                    
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
			<?php $i++;?>
		@endforeach
		</table>

	</div>
@stop