
<!-- Extending master page -->
@extends('master')

<!-- Proving active class -->
@section('dropdown-active-feature')
	active
@stop

<!-- Seting up the title of the page -->
@section('title')
  Mero Ticket::Admin - Add Feature
@stop

<!-- providing active class -->
@section('feature-class')
	active
@stop

@section('content')
	
	<div class="alert alert-dismissible alert-success">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-check-square-o" ></i></strong> Feature has been successfully added.
	        </div>
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
		@elseif(Session::get('errors'))
			<div class="alert alert-dismissible alert-danger">
	          <button type="button" class="close" data-dismiss="alert">×</button>
	          <strong><i class="fa fa-exclamation-triangle"></i></strong> {{$errors->first('name')}}.
	        </div>
		@endif
		<legend>Add Feature</legend>
    	<h4>Please give the correct information</h4>
    	<hr>
		{{ Form::open(array('class'=>'form-horizontal', 'route'=>'postFeature')) }}
		  <fieldset>
		    
		    <div class="form-group">
		      <label class="col-lg-2 control-label">Feature Name</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" id="feature" name="feature" placeholder="e.g. wifi">
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="submit" class="btn btn-primary">Add Feature</button>
		      </div>
		    </div>
		   </fieldset>
		 {{ Form::close() }}

		 <hr>
		 <h4>Please give the correct information while editing the feature</h4>
		 @if(isset($results)!==null)
		 	<table class="table">
		 		<tr>
		 			<th>#</th>
		 			<th>Feature Name</th>
		 			<th>Action</th>
		 		</tr>
		 		<?php $i=1; ?>
				@foreach($results as $result)
		 			<tr>
		 				<td>{{$i}}</td>
		 				<td>{{strtoupper($result['name'])}}</td>
		 				<td>
		 					<a href="#editModal{{$result['name']}}" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button></a>
		 					<!-- start Edit Model -->
			              <div class="modal" id="editModal{{$result['name']}}">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                  {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postEditFeature')) }}
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4 class="modal-title"><i class="fa fa-pencil"></i> | Edit Feature</h4>
			                    </div>
			                    <div class="modal-body">
			                        <fieldset>

			                          <input type="hidden" name="id" value="{{$result['id']}}">                          
			                          
			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Feature Name</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="feature" value="{{strtoupper($result['name'])}}">
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
			              {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteFeature')) }}
			              <!-- start Delete Model -->
			              <div class="modal" id="deleteModal">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4><i class="fa fa-exclamation-triangle"></i> | Are you sure want to move this feature to trash?</h4>                    
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
		 			</tr>
		 			<?php $i++ ?>
		 		@endforeach
		 	</table>
		 @else

		 @endif
	</div>
@stop