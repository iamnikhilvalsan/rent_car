@extends('admin.master')
@section('body')
<style type="text/css">
#container {
	min-width: 310px;
	/*max-width: 800px;*/
	height: 400px;
	margin: 0 auto
}
.label{
	letter-spacing: 0.5px !important;
	font-weight: 500 !important;
}
.info-box-content{
	margin-left: 0px;
}
.info-box{
	background: #cddc39 !important;
	color: black !important;
}
.table-thubnail{
	height: 35px !important;
	width: 35px !important;
}
.products-list .product-info {
    margin-left: 45px !important;
}
</style>


<div class="row">
	<div class="col-lg-3 col-xs-6">
		<div class="small-box text-center bg-aqua">
			<div class="inner">
				<h3>{{$CustomersCount}}</h3>
				<p>Customes</p>
			</div>
			<div class="icon">
			</div>
			<a href="{{ route('view-customers') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<div class="small-box text-center bg-red">
			<div class="inner">
				<h3>{{$CarsCount}}</h3>
				<p>Vehicles</p>
			</div>
			<div class="icon">
			</div>
			<a href="{{ route('view-vehicles') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<div class="small-box text-center bg-green">
			<div class="inner">
				<h3>{{$PBookingsCount}}</h3>
				<p>Pending Bookings</p>
			</div>
			<div class="icon">
			</div>
			<a href="{{ route('booking-requests') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<div class="small-box text-center bg-yellow">
			<div class="inner">
				<h3>{{$CBookingsCount}}</h3>
				<p>Confirmed Bookings</p>
			</div>
			<div class="icon">
			</div>
			<a href="{{ route('confirmed-bookings') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>

@endsection