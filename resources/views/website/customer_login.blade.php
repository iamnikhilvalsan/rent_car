@extends('website.master')
@section('body')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('/web_assets/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">LOGIN</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-2"></div>
          	<div class="col-md-8 block-9 mb-md-5">
	            <form action="{{route('customer-login-submit')}}" method="post" enctype="multipart/form-data" autocomplete="off">
	            	@csrf
	            	<h3 style="text-align: center;">LOGIN</h3>
	            	<hr><br>
	            	@include('admin.flash-message')
	              <div class="form-group">
	                <input type="email" class="form-control" required name="email" placeholder="Email ID">
	              </div>
	              <div class="form-group">
	                <input type="password" class="form-control" required name="password" placeholder="Password">
	              </div>
	              <div class="form-group">
	                <input type="submit" value="LOGIN" class="btn btn-primary py-3 px-5" style="width: 100%;">
	                <span>Don't have an account? <a href="{{route('customer-register')}}">Sign up</a></span>
	              </div>
	            </form>
	          
	          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </section>

@endsection