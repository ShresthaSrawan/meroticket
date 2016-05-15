<!-- Extending master page -->
@extends('master')

<!-- Providing page title -->
@section('title')
	Mero Ticket::Admin - Owner Confirmation
@stop

<!-- Adding active class -->
<?php
$bus_owner_page = 1;
$confirm_owner_page = 1;
?>
<!-- providing page content -->
@section('content')
	<div class="container">
		
		<legend>Confirm Owner Registration</legend>
		@if($results==null)
		<h4>There is no owner to be confirmed.</h4>
		@else
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
			<table class="table">
				<tr>
					<th>#</th>
					<th>Company Name</th>
					<th>Owner Name</th>
					<th>Email</th>
					<th>Contact Number</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
				<?php $i=1; ?>
				@foreach($results as $result)
					<tr>
						<td>{{$i}}</td>
						<td>{{ucwords($result['companyname'])}}</td>
						<td>{{ucwords($result['ownername'])}}</td>
						<td>{{$result['email']}}</td>
						<td>{{$result['contact_number']}}</td>
						<td>{{ucwords($result['address'])}}</td>
						<td>



							  <a href="#confirmModal" data-toggle="modal"><button type="submit" class="btn btn-primary" ><i class="fa fa-list-alt"></i> Confirm</button></a>
				              
				              <!-- start confirm Model -->
				              <div class="modal" id="confirmModal">
				                <div class="modal-dialog">
				                  <div class="modal-content">
				                  {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postConfirmationView')) }}
				                    <div class="modal-header">
				                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				                      <h4>Are you sure want to confirm {{ucwords($result['companyname'])}}?</h4>                 
				                    </div>
				                    <input type="hidden" class="form-control" name="ownerid" value="{{$result['id']}}">
				                    <div class="modal-footer">				                    
					                    <button type="submit" class="btn btn-primary">Yes</button>
					                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				                    </div>
				                    {{ Form::close() }}
				                  </div>
				                </div>
				              </div>
				              <!-- End of confirm Modal -->

	            			<!-- This is the Delete button, it will trigger delete modal -->
	            			<a href="#deleteModal{{$result['id']}}" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Delete</button></a>
			            	
			            	<!-- start Delete Model -->
			            	<div class="modal" id="deleteModal{{$result['id']}}">
			                	<div class="modal-dialog">
			                  		<div class="modal-content">
			                  		{{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteConfirmation')) }}
			                    		<div class="modal-header">
			                      			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      			<h4><i class="fa fa-trash-o"></i> | Are you sure want to delete {{ucwords($result['companyname'])}}?</h4>                    
			                    		</div>
			                    		<!-- THis is the hidden field which will delever id from owner table -->
			                    		<input type="hidden" name="ownerid" value="{{$result['id']}}">
			                    		<div class="modal-footer">                      
			                      			<button type="submit" class="btn btn-primary">Yes</button>
			                      			<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			                    		</div>
			                    		{{ Form::close() }}
			                  		</div>
			                	</div>
			            	</div><!-- End of Delete Modal -->
	            			
						</td>

						<?php $i++?>
					</tr>
				@endforeach
			</table>
		@endif
	</div>
@stop