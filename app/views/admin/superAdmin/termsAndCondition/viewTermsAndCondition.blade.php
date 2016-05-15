<!-- Extending master page -->

@extends('master')

<!-- Providing page title -->
@section('title')
	Mero Ticket::Admin - View Terms and Condition
@stop

<!-- Adding active class -->
@section('terms-and-condition')
	active
@stop

@section('view-terms-and-condition')
	active
@stop

<!-- providing page content -->
@section('content')
	<div class="container">	
		<legend>Add Terms and Condition</legend>
    	<h4>Please give the correct information</h4>
    	<hr>
		@if(isset($message))
			<div class="alert alert-dismissible alert-success">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-check-square-o" ></i></strong> {{$message}}.
	        </div>
	    @elseif(isset($errormessage))
	    	<div class="alert alert-dismissible alert-danger">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-exclamation-triangle"></i></strong> {{$errormessage}}.
	        </div>
		@else
		
			<table class="table">
				<tr>
					<th>#</th>
					<th>Header</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
				
				<?php $i=1;?>
				@foreach($results as $result)
				<tr>
					<td>{{$i}}</td>
					<td>{{$result['header']}}</td>
					<td>{{(strlen($result['description'])>10)? substr($result['description'],0,10)."...." : $result['description']}}</td>
					<td>
						<a href="#editModal{{$result['id']}}" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button></a>
	 					<!-- start Edit Model -->
			              <div class="modal" id="editModal{{$result['id']}}">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                  {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postEditTermsAndCondition')) }}
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4 class="modal-title"><i class="fa fa-pencil"></i> | Edit Terms and Condition</h4>
			                    </div>
			                    <div class="modal-body">
			                        <fieldset>

			                          <input type="hidden" name="id" value="{{$result['id']}}">                          
			                          
			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Header</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="header" value="{{strtoupper($result['header'])}}">
			                            </div>
			                          </div>

			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Description</label>
			                            <div class="col-lg-10">
			                            	<textarea class="form-control" rows="3" name="description">{{$result['description']}}</textarea>
			                            </div>
			                          </div> 

			                        </fieldset>
			                      
			                    </div>
			                    <div class="modal-footer">				                    
			                    	<button type="submit" class="btn btn-primary">Save changes</button>
			                    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                    </div>
			                    {{ Form::close() }}
			                  </div>
			                </div>
			              </div><!-- End of Edit Modal -->

			              <a href="#deleteModal" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Trash</button></a>
			              {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteTermsAndCondition')) }}
			              <!-- start Delete Model -->
			              <div class="modal" id="deleteModal">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4><i class="fa fa-exclamation-triangle"></i> | Are you sure want to delete?</h4>                    
			                    </div>

			                    <input type="hidden" name="id" value="{{$result['id']}}">
			                    
			                    <div class="modal-footer">                      
			                      <button type="submit" class="btn btn-primary">Yes</button>
			                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			                    </div>
			                  </div>
			                </div>
			              </div><!-- End of Delete Modal -->
			              {{ Form::close() }}
			              <?php $i++;?>
					</td>
					</tr>
				@endforeach
				
			</table><!-- End of Table -->

		@endif
	</div>
@stop