<!-- Extending master page -->

@extends('master')

<!-- Providing page title -->
@section('title')
	Mero Ticket::Admin - All Owner
@stop

<!-- Adding active class -->
<?php
$bus_owner_page = 1;
$view_owner_page = 1;
?>

<!-- providing page content -->
@section('content')
	<div class="container">		

		<div class="alert alert-dismissible alert-info">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Quick Tip!</strong> Please select the desired option from list below
		</div>

		<!-- Tab Menu -->
		<ul class="nav nav-tabs">		  
		  <li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="" aria-expanded="true">
		      Select Owner <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu" style="mouse:pointer;">
		      <li><a href="#dropdown1 " data-toggle="tab" aria-expanded="true">All Owner</a></li>
		      <!-- <li class="divider"></li> -->
		      <li><a href="#dropdown2" data-toggle="tab">Pending Owner</a></li>
		      <li><a href="#dropdown3" data-toggle="tab">Confirmed Owner</a></li>
		      <li><a href="#dropdown4" data-toggle="tab">Deleted Owner</a></li>
		    </ul>
		  </li>
		</ul>
		<div id="myTabContent" class="tab-content">		  
		  <div class="tab-pane fade active in" id="dropdown1">
		  	<h2>All Owner</h2>
		    <!-- Table starts here -->
			<table class="table">
				<tr>
					<th>#</th>
					<th>Company Name</th>
					<th>Owner Name</th>
					<th>Email</th>
					<th>Contact Number</th>
					<th>Address</th>
					<th>Status</th>
				</tr>
				<?php $i=1; ?>
				@foreach($results as $result)
					@if($result['status']==0)
						<tr class="text-danger">
					@elseif($result['status']==1)
						<tr class="text-info">
					@else
						<tr>
					@endif
						<td>{{$i}}</td>
						<td>{{ucwords($result['companyname'])}}</td>
						<td>{{ucwords($result['ownername'])}}</td>
						<td>{{$result['email']}}</td>
						<td>{{$result['contact_number']}}</td>
						<td>{{ucwords($result['address'])}}</td>
						<td>
							@if($result['status']==0)
								Deleted
							@elseif($result['status']==1)
								Pending
							@else
								Confirmed
							@endif
						</td>

					<?php $i++?>
					</tr>
				@endforeach
			</table>			
		  </div>
		  <div class="tab-pane fade" id="dropdown2">
		  		<h4>Pending Owner</h4>		  		
		  		@if($pendingowner==null)
		  			<hr>
		  			<h2><i class="fa fa-exclamation-triangle"></i> There is no pending owner available.</h2>
		  		@else
			    	<table class="table">
						<tr>
							<th>#</th>
							<th>Company Name</th>
							<th>Owner Name</th>
							<th>Email</th>
							<th>Contact Number</th>
							<th>Address</th>
							<th>Status</th>
						</tr>
						<?php $i=1; ?>
						@foreach($pendingowner as $pending)
							<tr class="text-info">
								<td>{{$i}}</td>
								<td>{{ucwords($pending['companyname'])}}</td>
								<td>{{ucwords($pending['ownername'])}}</td>
								<td>{{$pending['email']}}</td>
								<td>{{$pending['contact_number']}}</td>
								<td>{{ucwords($pending['address'])}}</td>
								<td>Pending</td>

							<?php $i++?>
							</tr>
						@endforeach
					</table>
				@endif
		  	</div>
		  <div class="tab-pane fade" id="dropdown3">
		  	<h2>Confirmed Owner</h2>
		  	@if($confirmedowner==null)
		  		<hr>
		  		<h4><i class="fa fa-exclamation-triangle"></i> Owner has not been confirmed yet.</h4>
		  	@else
		    	<table class="table">
					<tr>
						<th>#</th>
						<th>Company Name</th>
						<th>Owner Name</th>
						<th>Email</th>
						<th>Contact Number</th>
						<th>Address</th>
						<th>Status</th>
					</tr>
					<?php $i=1; ?>
					@foreach($confirmedowner as $confirmed)
						<tr>
							<td>{{$i}}</td>
							<td>{{ucwords($confirmed['companyname'])}}</td>
							<td>{{ucwords($confirmed['ownername'])}}</td>
							<td>{{$confirmed['email']}}</td>
							<td>{{$confirmed['contact_number']}}</td>
							<td>{{ucwords($confirmed['address'])}}</td>
							<td>Confirmed</td>

						<?php $i++?>
						</tr>
					@endforeach
				</table>
			@endif
		  </div>
		  <div class="tab-pane fade" id="dropdown4">
		  	<h2>Deleted Owner</h2>
		  	@if($deletedowner==null)
		  		<hr>
		  		<h4><i class="fa fa-exclamation-triangle"></i> Owner has not been deleted yet.</h4>
		  	@else
		    	<table class="table">
					<tr>
						<th>#</th>
						<th>Company Name</th>
						<th>Owner Name</th>
						<th>Email</th>
						<th>Contact Number</th>
						<th>Address</th>
						<th>Status</th>
					</tr>
					<?php $i=1; ?>
					@foreach($deletedowner as $deleted)
						<tr class="text-danger">
							<td>{{$i}}</td>
							<td>{{ucwords($deleted['companyname'])}}</td>
							<td>{{ucwords($deleted['ownername'])}}</td>
							<td>{{$deleted['email']}}</td>
							<td>{{$deleted['contact_number']}}</td>
							<td>{{ucwords($deleted['address'])}}</td>
							<td>Deleted</td>

						<?php $i++?>
						</tr>
					@endforeach
				</table>
			@endif
		</div>

		<!-- end of dropdown menu -->


	</div>
@stop