@extends('admin.master')
@section('body')

<h1>
@if(Route::current()->getName() === 'add-vehicles')
	Add Vehicles
@else
	Edit Vehicles
@endif
</h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">
		@if(Route::current()->getName() === 'add-vehicles')
			Add Vehicles
		@else
			Edit Vehicles
		@endif
	</li>
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
	<form action="{{route('add-vehicles-save')}}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
		<div class="col-md-4">
			<div class="form-group">
				<label>Brand <span class="required">*</span></label>
				<select class="form-control" name="brands_id" id="brands_id" required>
					<option value="">Select Brand</option>
					@foreach($brands as $DT)
					<option value="{{$DT->brands_id}}" @if($cars && $cars->brands_id==$DT->brands_id) {{'selected'}} @endif>{{$DT->brands}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Types <span class="required">*</span></label>
				<select class="form-control" name="car_types_id" id="car_types_id" required>
					<option value="">Select Types</option>
					@foreach($car_types as $DT)
					<option value="{{$DT->car_types_id}}" @if($cars && $cars->car_types_id==$DT->car_types_id) {{'selected'}} @endif>{{$DT->car_types}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Seating <span class="required">*</span></label>
				<select class="form-control" name="seat_type" id="seat_type" required>
					<option value="">Select Seating</option>
					<option value="2" @if($cars && $cars->seat_type=='2') {{'selected'}} @endif>2 Seater</option>
					<option value="4" @if($cars && $cars->seat_type=='4') {{'selected'}} @endif>4 Seater</option>
					<option value="5" @if($cars && $cars->seat_type=='5') {{'selected'}} @endif>5 Seater</option>
					<option value="6" @if($cars && $cars->seat_type=='6') {{'selected'}} @endif>6 Seater</option>
					<option value="7" @if($cars && $cars->seat_type=='7') {{'selected'}} @endif>7 Seater</option>
				</select>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Title <span class="required">*</span></label>
				<input type="text" class="form-control" name="title" id="title" placeholder="Title" required value="{{$cars?$cars->title:''}}">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Model <span class="required">*</span></label>
				<input type="text" class="form-control" name="model" id="model" placeholder="Model" required value="{{$cars?$cars->model:''}}">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Reg. No <span class="required">*</span></label>
				<input type="text" class="form-control" name="number" id="number" placeholder="Reg. No" required value="{{$cars?$cars->number:''}}">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Price Per Day ($)<span class="required">*</span></label>
				<input type="number" class="form-control" name="price_per_day" id="price_per_day" placeholder="Price Per Day" required value="{{$cars?$cars->price_per_day:''}}">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Mileage Per Litter (KM)<span class="required">*</span></label>
				<input type="number" class="form-control" name="mileage_per_litter" id="mileage_per_litter" placeholder="Mileage Per Litter" required value="{{$cars?$cars->mileage_per_litter:''}}">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Fuel Type <span class="required">*</span></label>
				<select class="form-control" name="fuel_type" id="fuel_type" required>
					<option value="">Select Fuel Type</option>
					<option value="Diesel" @if($cars && $cars->fuel_type=='Diesel') {{'selected'}} @endif>Diesel</option>
					<option value="Electric" @if($cars && $cars->fuel_type=='Electric') {{'selected'}} @endif>Electric</option>
					<option value="Hybrid" @if($cars && $cars->fuel_type=='Hybrid') {{'selected'}} @endif>Hybrid</option>
					<option value="Petrol" @if($cars && $cars->fuel_type=='Petrol') {{'selected'}} @endif>Petrol</option>
				</select>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Transmission <span class="required">*</span></label>
				<select class="form-control" name="transmission" id="transmission" required>
					<option value="">Select Transmission</option>
					<option value="Automatic" @if($cars && $cars->transmission=='Automatic') {{'selected'}} @endif>Automatic</option>
					<option value="Manual" @if($cars && $cars->transmission=='Manual') {{'selected'}} @endif>Manual</option>
				</select>
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<label>Description <span class="required">*</span></label>
				<textarea type="text" class="form-control" name="description" placeholder="Description" required rows="1">{{$cars?$cars->description:''}}</textarea>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label>Title Image <span class="required">(700x500)</span></label>
				<input type="file" accept=".jpg,.webp"  class="form-control" name="image">
			</div>
		</div>
		<!-- <div class="col-md-3">
			<div class="form-group">
				<label>Image <span class="required">(500x500)</span></label>
				<input type="file" accept=".jpg"  class="form-control" name="image_2">
			</div>
		</div> -->

		<div class="col-md-4">
			<div class="form-group">
				<input type="hidden" id='cars_id' name="cars_id" value="{{$cars?$cars->cars_id:''}}"/>
				<input type="submit" class="btn btn-primary" name="filter" value="Save Details" style="margin-top: 25px;">
				<input type="reset" class="btn btn-primary" name="reset" value="Reset" style="margin-top: 25px;margin-left: 10px;">
			</div>
		</div>
	</form>
</div>

@endsection