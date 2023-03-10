<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/png" href="{{asset('assets/app_images/app_icon.png')}}" sizes="30x30">
	<title>{{ config('app.name') }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/web_assets/css/open-iconic-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/aos.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/jquery.timepicker.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/icomoon.css')}}">
	<link rel="stylesheet" href="{{asset('/web_assets/css/style.css')}}">

	@stack('style')
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="{{ route('home') }}">RENT<span>CAR</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item @if(Route::current()->getName() === 'home'){{'active'}} @endif"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
					<li class="nav-item  @if(Route::current()->getName() === 'view-cars' || Route::current()->getName() === 'view-car-details'){{'active'}} @endif"><a href="{{ route('view-cars') }}" class="nav-link">Cars</a></li>
					@if(session('customers_id'))
						<li class="nav-item @if(Route::current()->getName() === 'my-bookings'){{'active'}} @endif"><a href="{{ route('my-bookings') }}" class="nav-link">My Bookings</a></li>
						<li class="nav-item @if(Route::current()->getName() === 'my-profile'){{'active'}} @endif"><a href="{{ route('my-profile') }}" class="nav-link">My Profile</a></li>
						<li class="nav-item "><a href="{{ route('customer-logout') }}" class="nav-link">Logout</a></li>
					@else
						<li class="nav-item @if(Route::current()->getName() === 'login'){{'active'}} @endif"><a href="{{ route('customer-login') }}" class="nav-link">Login</a></li>
					@endif
					<!-- <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Services</a></li> -->
					<!-- <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Blog</a></li> -->
					<!-- <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Contact</a></li> -->
				</ul>
			</div>
		</div>
	</nav>
    <!-- END nav -->

    @yield('body')


    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="{{ route('home') }}" class="logo">Rent<span>CAR</span></a></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
                <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>Copyright &copy; {{ date('Y') }} All rights reserved</p>
          </div>
        </div>
      </div>
    </footer>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


	<script src="{{asset('/web_assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/popper.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/jquery.easing.1.3.js')}}"></script>
	<script src="{{asset('/web_assets/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/aos.js')}}"></script>
	<script src="{{asset('/web_assets/js/jquery.animateNumber.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('/web_assets/js/jquery.timepicker.min.js')}}"></script>
	<script src="{{asset('/web_assets/js/scrollax.min.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="{{asset('/web_assets/js/google-map.js')}}"></script>
	<script src="{{asset('/web_assets/js/main.js')}}"></script>
    
</body>
</html>