
<!-- Extending master page -->
@extends('master')

<!-- Providing page title -->
@section('title')
	Mero Ticket::Admin - All Terms and Condition from Trash
@stop

<!-- Adding active class -->
<?php
$trashcity = 1;
?>

<!-- providing page content -->
@section('content')
	<div class="container">
		<h3>Bus Type</h3>
		<hr>
		@if(isset($message))
		  	<div class="alert alert-dismissible alert-success">
		    	<button type="button" class="close" data-dismiss="alert">×</button>
		    	<strong>Success!</strong> {{$message}}
		  	</div>
		
		@elseif(isset($errormessage))
			<div class="alert alert-dismissible alert-danger">
        		<button type="button" class="close" data-dismiss="alert">×</button>
        		<strong><i class="fa fa-exclamation-triangle"></i></strong> {{$errormessage}}
        	</div>
		
		@else

		<h3>Following are the Terms and Condition, moved to trash by its owner</h3>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Heading</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
			<tr>
				<?php $i=1;?>
				@foreach($results as $result)
					<td>{{$i}}</td>
					<td>{{ ucwords($result['header']) }}</td>
					<td>{{(strlen($result['description'])>10)? substr($result['description'],0,10)."...." : $result['description']}}</td>					
					<td>
						<a href="#deleteModal" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Delete</button></a>
	 					<!-- start Edit Model -->
		              <div class="modal" id="deleteModal">
		                <div class="modal-dialog">
		                  <div class="modal-content">
		                  {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteTrashTermsAndCondition')) }}
		                    <div class="modal-header">
		                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                      <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> | Are you sure want to permanently Delete?</h4>
		                    </div>
		                    <div class="modal-body">

		                    <input type="hidden" name="id" value="{{$result['id']}}">                 		                      
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
		              {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postUndoTrashTermsAndCondition')) }}
		              <!-- start Delete Model -->
		              <div class="modal" id="undoDeleteModal">
		                <div class="modal-dialog">
		                  <div class="modal-content">
		                    <div class="modal-header">
		                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                      <h4><i class="fa fa-exclamation-triangle"></i> | Are you sure want to undo?</h4>                    
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
					</td>
					<?php $i++;?>
				@endforeach
			</tr>
		</table>
		@endif
	</div>
@stop	