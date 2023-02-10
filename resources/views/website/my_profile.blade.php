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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Profile <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">My Profile</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-2"></div>
          	<div class="col-md-8 block-9 mb-md-5">
	            <form action="{{route('update-profile')}}" method="post" enctype="multipart/form-data" autocomplete="off">
	            	@csrf
	            	<h3 style="text-align: center;">My Profile</h3>
	            	<hr><br>
	            	@include('admin.flash-message')
	              <div class="form-group">
	                <input type="text" class="form-control" required name="name" placeholder="Name" value="{{$DT->name}}">
	              </div>
	              <div class="form-group">
	                <input type="number" class="form-control" required name="mobile" placeholder="Mobile Number" value="{{$DT->mobile}}">
	              </div>
	              <div class="form-group">
	                <input type="email" class="form-control" readonly required name="email" placeholder="Email ID" value="{{$DT->email}}">
	              </div>
	              <div class="form-group">
		              <select required name="gender" class="form-control">
		              	<option value="">Select Gender</option>
		              	<option value="Male" @if($DT && $DT->gender=='Male') {{'selected'}} @endif>Male</option>
		              	<option value="Female" @if($DT && $DT->gender=='Female') {{'selected'}} @endif>Female</option>
		              </select>
		            </div>
	              <div class="form-group">
	                <input type="submit" value="Update Profile" class="btn btn-primary py-3 px-5" style="width: 100%;">
	              </div>
	            </form>
	          
	          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </section>

@endsection