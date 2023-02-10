@extends('website.master')
@section('body')
<style type="text/css">
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type=number] {
  -moz-appearance: textfield;
}
</style>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('/web_assets/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Bookings <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">My Bookings</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
      	<h3 style="text-align: center;">My Bookings</h3><hr><br>
      	@include('admin.flash-message')
        <div class="row d-flex mb-5 contact-info">
        	
        	@foreach($bookings as $DT)
        	<div class="col-md-2"></div>
          	<div class="col-md-8 block-9 mb-md-5" style="border: 1px solid gray;padding: 15px;">
	          	<table style="width: 100%">

	          			@php 
									$fdate = $DT->pickup_date;
									$tdate = $DT->return_date;
									$datetime1 = new DateTime($fdate);
									$datetime2 = new DateTime($tdate);
									$interval = $datetime1->diff($datetime2);
									$days = $interval->format('%a')+1;
									$amount = $DT->price_per_day*$days;
									@endphp

	          			<tr>
	          				<th style="width: 100px">Booking&nbsp;Status</th>
	          				<td>:</td>
	          				<td colspan="4">
	          					
	          					@if($DT->status=='0')
												Pending
											@elseif($DT->status=='1')
												Confirmed
											@elseif($DT->status=='2')
												Rejected
											@else
												Completed
											@endif

	          				</td>
	          			</tr>
	          			<tr>
	          				<th style="width: 100px">Booking&nbsp;Date</th>
	          				<td>:</td>
	          				<td>{{$DT->booking_date->format('d-m-Y')}}</td>
	          				<th style="width: 100px">Amount&nbsp;($)</th>
	          				<td>:</td>
	          				<td>{{$amount}}</td>
	          			</tr>

	          			<tr>
	          				<th style="width: 100px">Vehicle</th>
	          				<td>:</td>
	          				<td>{{ $DT->title; }}</td>
	          				<th style="width: 100px">Number</th>
	          				<td>:</td>
	          				<td>{{ $DT->number; }}</td>
	          			</tr>

	          			<tr>
	          				<th style="width: 100px">Pickup&nbsp;Date</th>
	          				<td>:</td>
	          				<td>{{ $DT->pickup_date->format('d-m-Y'); }}</td>
	          				<th style="width: 100px">Return&nbsp;Date</th>
	          				<td>:</td>
	          				<td>{{ $DT->return_date->format('d-m-Y'); }}</td>
	          			</tr>

	          			<tr>
	          				<th style="width: 100px">Message</th>
	          				<td>:</td>
	          				<td colspan="4">{{ $DT->message }}</td>
	          			</tr>

	          	</table>
	          </div>
          <div class="col-md-2"></div>
          @endforeach
        </div>
      </div>
    </section>

@endsection