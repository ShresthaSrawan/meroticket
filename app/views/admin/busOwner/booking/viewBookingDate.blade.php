<!-- Extending master page -->
@extends('master')

<!-- Proving active class -->
@section('dropdown-active-ticket-booking')
	active
@stop

<!-- Seting up the title of the page -->
@section('title')
  Mero Ticket::Admin - View Booking Date
@stop

<!-- providing active class -->
@section('edit-booking-date-class')
	active
@stop

@section('content')

	
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
		@endif
		@if($results==null)
			<h3>You have not added any booking date yet.</h3>
		@else
		<legend>Edit and Delete Booking Date</legend>
		<h5>Please be informed that number you provide in 'Kid', 'Student', 'Elder' is the discount amount and it will calculated in percentage. Please do not enter more than 100 or less than 1.</h5>
		<h5>The Number you provide in 'Below 10K.g.', 'Below 50 K.G.' and 'Below 100 K.G.' will not be calculated in percentage.</h5>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Bus Name</th>
				<th>From</th>
				<th>To</th>
				<th>Date</th>
				<th>Ticket Price</th>
				<th>Kid</th>
				<th>Student</th>
				<th>elder</th>
				<th>Below 10(K.G.)</th>
				<th>Below 50(K.G.)</th>
				<th>Below 100(K.G.)</th>
				<th>Action</th>
			</tr>
			<?php $i=1; ?>
			@foreach($results as $result)
				<tr>
					<td>{{$i}}</td>
					<td>{{ucwords($result['busname'])}}</td>
					<td>{{ucwords($result['from'])}}</td>
					<td>{{ucwords($result['to'])}}</td>
					<td>{{$result['date']}}</td>
					<td>{{$result['ticket_price']}}</td>
					<td>{{$result['kid']}}</td>
					<td>{{$result['student']}}</td>
					<td>{{$result['elder']}}</td>
					<td>{{$result['luggage10']}}</td>
					<td>{{$result['luggage50']}}</td>
					<td>{{$result['luggage100']}}</td>
					<td>
						
						<a href="#edit{{$result['busid']}}-MeroTicket" data-toggle="modal"><button type="submit" class="btn btn-primary" ><i class="fa fa-pencil"></i> Edit</button></a>
              
			              <!-- start Edit Model -->
			              <div class="modal" id="edit{{$result['busid']}}-MeroTicket">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                  {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postEditBookingDate')) }}
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4 class="modal-title">Edit Bus</h4>
			                    </div>
			                    <div class="modal-body">
			                        <fieldset>
			                                                  
			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Bus Name</label>
			                            <div class="col-lg-10">
			                              <select name="bus" class="form-control">
			                                @foreach($buses as $bus)
			                                 <option value="{{$bus['id']}}" {{$result['busid']==$bus['id'] ? 'selected':''}}>{{$bus['name']}}</option>
			                                @endforeach
			                              </select>
			                            </div>
			                          </div>

			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Route Name</label>
			                            <div class="col-lg-10">
			                              <select name="route" class="form-control">
			                                @foreach($routes as $route)
			                                 <option value="{{$route['id']}}" {{$result['routeid']==$route['id'] ? 'selected':''}}>{{$route['from']}} to {{$route['to']}}</option>
			                                @endforeach
			                              </select>
			                            </div>
			                          </div>           
			                          <input type="hidden" value="{{$result['id']}}" name="id">
			                          
			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Date</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="date" value="{{$result['date']}}">
			                            </div>
			                          </div>
			                          
			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Ticket price</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="ticket_price" value="{{$result['ticket_price']}}">
			                            </div>
			                          </div>

			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Discount-kid</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="kid" value="{{$result['kid']}}">
			                            </div>
			                          </div>

			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Discount-Student</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="student" value="{{$result['student']}}">
			                            </div>
			                          </div>

			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Discount-Elder</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="elder" value="{{$result['elder']}}">
			                            </div>
			                          </div>

			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Luggage below 10(K.G)</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="luggage10" value="{{$result['luggage10']}}">
			                            </div>
			                          </div>

			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Luggage below 50(K.G.)</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="luggage50" value="{{$result['luggage50']}}">
			                            </div>
			                          </div>

			                          <div class="form-group">
			                            <label class="col-lg-2 control-label">Luggage below 100(K.G.)</label>
			                            <div class="col-lg-10">
			                              <input type="text" class="form-control" name="luggage100" value="{{$result['ticket_price']}}">
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

			              <a href="#delete{{$result['id']}}-MeroTicket" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Trash</button></a>
			              {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteBookingDate')) }}
			              <!-- start Delete Model -->
			              <div class="modal" id="delete{{$result['id']}}-MeroTicket">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4><i class="fa fa-trash-o"></i> | Are you sure want to move it to Trash?</h4>                    
			                    </div>
			                    <input type="hidden" class="form-control" name="id" value="{{$result['id']}}">			                    
			                    <div class="modal-footer">                      
			                      <button type="submit" class="btn btn-primary">Yes</button>
			                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			                    </div>
			                  </div>
			                </div>
			              </div><!-- End of Delete Modal -->
			              {{ Form::close() }}
						
					</td>
					<?php $i++ ?>
				</tr>				
			@endforeach
		</table>
		@endif
	

@stop