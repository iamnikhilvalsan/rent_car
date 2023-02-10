@extends('admin.master')
@section('body')


<h1>View
	@if($MainStatus=='0')
		Pending
	@elseif($MainStatus=='1')
		Confirmed
	@elseif($MainStatus=='2')
		Rejected
	@else
		Completed
	@endif
Bookings</h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">View
		@if($MainStatus=='0')
			Pending
		@elseif($MainStatus=='1')
			Confirmed
		@elseif($MainStatus=='2')
			Rejected
		@else
			Completed
		@endif
	Bookings</li>
</ol>
</section>

<section class="content">


<div class="box">
<div class="box-header with-border">
	<div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
		<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
	</div>
</div>

<div class="box-body">
	@include('admin.flash-message')
	<div class="col-md-12 filter-div"></div>
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover dataTable">
				<thead>
					<tr>
						<th class="w-50">#</th>
						<th class="w-50">Booking&nbsp;Date</th>
						<th>Customer</th>
						<th>Mobile</th>
						<th class="w-50">Vehicle</th>
						<th class="w-50">Vehicle&nbsp;No.</th>
						<th class="w-50">Pickup&nbsp;Date</th>
						<th class="w-50">Return&nbsp;Date</th>
						<th class="w-50">Amount</th>
						<th>Message</th>
						<th class="text-center" colspan="1">Actions</th>
					</tr>
				</thead>
				<tbody>
					@php $i = 0; @endphp
					@foreach($bookings as $DT)

						<!-- Price Calculation -->
						@php 
						$i++;
						$fdate = $DT->pickup_date;
						$tdate = $DT->return_date;
						$datetime1 = new DateTime($fdate);
						$datetime2 = new DateTime($tdate);
						$interval = $datetime1->diff($datetime2);
						$days = $interval->format('%a')+1;
						$amount = $DT->price_per_day*$days;
						@endphp
						<!-- Price Calculation -->
						<tr>
							<td>{{ $i; }}</td>
							<td>{{ $DT->booking_date->format('d-m-Y'); }}</td>
							<td>{{ $DT->name; }}</td>
							<td>{{ $DT->mobile; }}</td>
							<td>{{ $DT->title; }}</td>
							<td>{{ $DT->number; }}</td>
							<td>{{ $DT->pickup_date->format('d-m-Y'); }}</td>
							<td>{{ $DT->return_date->format('d-m-Y'); }}</td>
							<td>{{ $amount; }} $</td>
							<td>{{ $DT->message; }}</td>

							<td class="text-center w-29">
								@if($MainStatus=='0')
									<a href="#" onclick="actionStatus({{ $DT->bookings_id; }})" title="Delete Topic" data-toggle="modal" data-target="#DeleteModal"><span class="label label-success">APPROVE</span></a>
								@elseif($MainStatus=='1')
								<a href="#" onclick="actionStatus({{ $DT->bookings_id; }})" title="Delete Topic" data-toggle="modal" data-target="#DeleteModal"><span class="label label-success">COMPLETE</span></a>
								@else
								---
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>


@if($MainStatus==0)
	<!-- ACTION MODAL -->
	<div class="modal fade" id="DeleteModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Request Status</h4>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet. Id illum perspiciatis est tempora fugiat hic similique veritatis! Cum cupiditate voluptas qui voluptate esse non placeat asperiores aut ipsam ratione?</p>
				</div>
				<div class="modal-footer">
					<form action="{{route('booking-request-status')}}" method="post">
	        			@csrf
						<input type="submit" class="btn btn-danger pull-left" name="reject" value="Reject Request">
						<input type="hidden" name="bookings_id" id="bookings_id">
						<input type="submit" class="btn btn-success" name="confirm" value="Confirm Request">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF ACTION MODAL -->
@else
	<!-- ACTION MODAL -->
	<div class="modal fade" id="DeleteModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Complete Request</h4>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet. Id illum perspiciatis est tempora fugiat hic similique veritatis! Cum cupiditate voluptas qui voluptate esse non placeat asperiores aut ipsam ratione?</p>
				</div>
				<div class="modal-footer">
					<form action="{{route('booking-request-status')}}" method="post">
	        			@csrf
	        			<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
						<input type="hidden" name="bookings_id" id="bookings_id">
						<input type="submit" class="btn btn-success" name="complete" value="Complete">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF ACTION MODAL -->
@endif

@endsection

@push('scripts')
<script type="text/javascript">
function actionStatus(bookings_id)
{
	$('#bookings_id').val(bookings_id);	
}
</script>
@endpush