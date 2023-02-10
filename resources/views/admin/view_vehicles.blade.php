@extends('admin.master')
@section('body')


<h1>View Vehicles</h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">View Vehicles</li>
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
						<th>Title</th>
						<th>Model</th>
						<th>Number</th>
						<th class="w-50">Brand</th>
						<th class="w-50">Type</th>
						<th class="w-50">Seat&nbsp;Type</th>
						<th class="w-50">Price/D</th>
						<th class="w-50">Mileage/L</th>
						<th class="w-50">Fuel</th>
						<th class="w-50">Transmission</th>
						<th class="w-50">Description</th>
						<th class="w-50">Image</th>
						<!-- <th class="w-50">Image</th> -->
						<th class="text-center" colspan="2">Actions</th>
					</tr>
				</thead>
				<tbody>
					@php $i = 0; @endphp
					@foreach($cars as $DT)
						@php $i++; @endphp
						<tr>
							<td>{{ $i; }}</td>
							<td>{{ $DT->title; }}</td>
							<td>{{ $DT->model; }}</td>
							<td>{{ $DT->number; }}</td>
							<td>{{ $DT->brands; }}</td>
							<td>{{ $DT->car_types; }}</td>
							<td>{{ $DT->seat_type; }} Seater</td>
							<td>{{ $DT->price_per_day; }} $</td>
							<td>{{ $DT->mileage_per_litter; }} Km/L</td>
							<td>{{ $DT->fuel_type; }}</td>
							<td>{{ $DT->transmission; }}</td>
							<td title="{{ $DT->description; }}"><div style="overflow: hidden;height: 20px;cursor: wait;"> {{ $DT->description; }}</div></td>

							@php

							$DT->image = asset('uploads/cars/'.$DT->image);
							$DT->image_2 = asset('uploads/cars/'.$DT->image_2);

							@endphp

							<td class="text-center">
								<img class="table-thubnail" onclick="view_image_popup('{{ $DT->image; }}')" src="{{ $DT->image; }}">
							</td>

							<!-- <td class="text-center">
								<img class="table-thubnail" onclick="view_image_popup('{{ $DT->image_2; }}')" src="{{ $DT->image_2; }}">
							</td> -->

							<td class="text-center w-29">
								<a href="{{route('edit-vehicles',$DT->cars_id)}}" onclick="" title="Edit Topic"><i class="fa fa-pencil-square"></i></a>
							</td>
							<td class="text-center w-29">
								<a href="#" onclick="deletedata({{ $DT->cars_id; }})" title="Delete Topic" data-toggle="modal" data-target="#DeleteModal"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>


<!-- DELETE MODAL -->
<div class="modal fade" id="DeleteModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete Vehicle</h4>
			</div>
			<div class="modal-body">
				<p>Do You Want To Delete Selected Vehicle?</p>
			</div>
			<div class="modal-footer">
				<form action="{{route('delete-vehicles')}}" method="post">
        			@csrf
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
					<input type="hidden" name="delete_id" id="delete_id">
					<input type="submit" class="btn btn-danger" name="delete" value="Delete">
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END OF DELETE MODAL -->

@endsection

@push('scripts')
<script type="text/javascript">
function deletedata(delete_id)
{
	$('#delete_id').val(delete_id);	
}
</script>
@endpush