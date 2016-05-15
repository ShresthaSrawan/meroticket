
<!-- Extending master page -->
@extends('master')

<!-- Providing page title -->
@section('title')
	Mero Ticket::Admin - All Bus from Trash
@stop

<!-- Adding active class -->
@section('')
	active
@stop

<!-- providing page content -->
@section('content')
	<div class="container">
		<h3>Bus</h3>
		<hr>
		@if(Session::get('message'))
		  	<div class="alert alert-dismissible alert-success">
		    	<button type="button" class="close" data-dismiss="alert">×</button>
		    	<strong>Success!</strong> {{Session::get('message')}}.
		  	</div>
		
		@elseif(Session::get('errormessage'))
			<div class="alert alert-dismissible alert-danger">
        		<button type="button" class="close" data-dismiss="alert">×</button>
        		<strong><i class="fa fa-exclamation-triangle"></i></strong> {{Session::get('errormessage')}}.
        	</div>		
		@else

		<h3>Following are the Bus, moved to trash by its owner</h3>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Company Name</th>
				<th>Name</th>
				<th>Image</th>
				<th>Number</th>
				<th>Type</th>
				<th>Description</th>
				<th>Total Seat</th>
				<th>Action</th>
			</tr>
			<tr>
				<?php $i=1;?>
				@foreach($buses as $bus)
					<td>{{$i}}</td>
					<td>{{ ucwords($bus['companyname']) }}</td>
					<td>{{ ucwords($bus['busname']) }}</td>
					<td>{{ $bus['image'] }}</td>
					<td>{{ $bus['number'] }}</td>
					<td>{{ ucwords($bus['bustypename']) }}</td>
					<td>{{ ucwords($bus['description']) }}</td>
					<td>{{ $bus['front_seat']+$bus['sideA']+$bus['sideB']+$bus['back_seat'] }}</td>
					<td>
						<a href="#editModal{{$bus['busname']}}1" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Delete</button></a>
	 					<!-- start Edit Model -->
		              <div class="modal" id="editModal{{$bus['busname']}}1">
		                <div class="modal-dialog">
		                  <div class="modal-content">
		                  {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteTrashBus')) }}
		                    <div class="modal-header">
		                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                      <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> | Are you sure want to permanently Delete?</h4>
		                    </div>
		                    <div class="modal-body">

		                    <input type="hidden" name="id" value="{{$bus['busid']}}">                 		                      
		                    </div>
		                    <div class="modal-footer">
		                    	<button type="submit" class="btn btn-primary">Yes</button>
		                    	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		                    </div>
		                    {{ Form::close() }}
		                  </div>
		                </div>
		              </div><!-- End of Edit Modal -->

		              <a href="#undoDeleteModal" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-undo"></i> Undo</button></a>
		              {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postUndoTrashBus')) }}
		              <!-- start Delete Model -->
		              <div class="modal" id="undoDeleteModal">
		                <div class="modal-dialog">
		                  <div class="modal-content">
		                    <div class="modal-header">
		                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                      <h4><i class="fa fa-exclamation-triangle"></i> | Are you sure want to undo?</h4>                    
		                    </div>

		                    <input type="hidden" name="id" value="{{$bus['busid']}}">
		                    
		                    <div class="modal-footer">                      
		                      <button type="submit" class="btn btn-primary">Yes</button>
		                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		                    </div>
		                  </div>
		                </div>
		              </div><!-- End of Delete Modal -->
		              {{ Form::close() }}
					</td>
					<?php $i++;?>
				@endforeach
			</tr>
		</table>
		@endif
	</div>
@stop	